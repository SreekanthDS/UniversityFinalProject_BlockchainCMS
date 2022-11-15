<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Tenant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class LoginTenantController extends Controller
{
    public function show(): Application|Factory|View
    {
        return view('central.tenants.login');
    }

    public function submit(Request $request): Application|RedirectResponse|Redirector
    {
        $this->validate($request, [
            'email' => 'exists:tenants',
        ]);

        /** @var Tenant $tenant */
        $tenant = Tenant::where('email', $email = $request->post('email'))->firstOrFail();

        return redirect(
            $tenant->route('tenant.login', ['email' => $email]),
        );
    }
}
