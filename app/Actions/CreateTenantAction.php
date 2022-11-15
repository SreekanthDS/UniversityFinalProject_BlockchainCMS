<?php

namespace App\Actions;

use App\Models\Tenant\Domain;
use App\Models\Tenant\Tenant;

/**
 * Create a tenant with the necessary information for the application.
 *
 * We don't use a listener here, because we want to be able to create "simplified" tenants in tests.
 * This action is only used when we need to create the tenant properly (with billing logic etc).
 */
class CreateTenantAction
{
    public function __invoke(array $data, string $domain): Tenant
    {
        /** @var Tenant $tenant */
        $tenant = Tenant::create($data + [
            'ready' => false,
        ]);

        /** @var Domain $newDomain */
        $newDomain = $tenant->createDomain([
            'domain' => $domain,
        ]);

        $newDomain->makePrimary();
        $newDomain->makeFallback();

        return $tenant;
    }
}
