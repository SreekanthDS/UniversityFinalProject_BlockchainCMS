<?php

namespace Database\Seeders;

use App\Actions\CreateTenantAction;
use Illuminate\Database\Seeder;

class TenantsAndDomains extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->testTenant();
    }

    private function testTenant(): void
    {
        $tenant = (new CreateTenantAction())([
            'name' => 'Customers',
            'company' => 'Public',
            'email' => 'public@blockchain-cms.test',
        ], 'customers');

        echo 'Customers Tenancy ID: '.$tenant->id.PHP_EOL;
    }
}
