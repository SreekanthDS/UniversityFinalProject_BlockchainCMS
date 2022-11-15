<?php

namespace App\Models\Tenant;

use App\Exceptions\NoPrimaryDomainException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

/**
 * @property mixed $company
 * @property string $name
 */
class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasFactory;
    use HasDatabase;
    use HasDomains;

    public $incrementing = false;

    protected $casts = [
        'trial_ends_at' => 'datetime',
    ];

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'email',
        ];
    }

    public function domain(): HasOne
    {
        return $this->hasOne(Domain::class);
    }

    public function primary_domain(): HasOne
    {
        return $this->hasOne(Domain::class)->where('is_primary', true);
    }

    public function fallback_domain(): HasOne
    {
        return $this->hasOne(Domain::class)->where('is_fallback', true);
    }

    /**
     * @throws NoPrimaryDomainException
     */
    public function route(string $route, array $parameters = [], bool $absolute = true): string
    {
        if (! $this->primary_domain) {
            throw new NoPrimaryDomainException();
        }

        $domain = $this->primary_domain->domain;

        $parts = explode('.', $domain);

        if (count($parts) === 1) { // If subdomain
            $domain = Domain::domainFromSubdomain($domain);
        }

        return tenant_route($domain, $route, $parameters, $absolute);
    }

    /**
     * @throws NoPrimaryDomainException
     */
    public function impersonationUrl(int $userId): string
    {
        /** @phpstan-ignore-next-line  */
        $token = tenancy()->impersonate($this, $userId, $this->route('tenant.organisation.list'), 'web')->token;

        return $this->route('tenant.impersonate', ['token' => $token]);
    }
}
