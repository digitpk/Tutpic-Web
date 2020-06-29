<?php

namespace App\Providers;

use App\Models\CompanyInfo;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();
        Schema::defaultStringLength(191);
        $company = CompanyInfo::first();
        if ($company)
            view()->share('info', $company);

        //
    }
}
