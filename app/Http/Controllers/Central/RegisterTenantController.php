<?php

namespace App\Http\Controllers\Central;

use App\Actions\CreateTenantAction;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class RegisterTenantController extends Controller
{
    public function show(): Application|Factory|View
    {
        return view('central.tenants.register');
    }

    public function submit(Request $request): Application|RedirectResponse|Redirector
    {
        $data = $this->validate($request, [
            'domain' => 'required|string|unique:domains',
            'company' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:tenants',
            'password' => 'required|string|confirmed|max:255',
        ]);

        $data['password'] = bcrypt($data['password']);

        $domain = $data['domain'];
        unset($data['domain']);

        $tenant = (new CreateTenantAction())($data, $domain);

        // We impersonate user with id 1. This user will be created by the CreateTenantAdmin job.
        return redirect($tenant->impersonationUrl(1));
    }
}
