<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        // Реєстрація політики доступу для моделей
        Gate::define('update-statistic', [StatisticPolicy::class, 'updateStatistic']);

        Gate::define('assign-buyer', [TeamUserPolicy::class, 'assignBuyer']);

        Gate::define('attach-role', [UserPolicy::class, 'attachRole']);
    }
}