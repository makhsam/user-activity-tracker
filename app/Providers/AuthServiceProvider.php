<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-admin', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('is-owner', function ($user, $owner) {
            return $user->hasRole('admin') || $user->id === $owner->id;
        });
    
        Gate::define('site-owner', function ($user, $site) {
            return $user->hasRole('admin') || $user->id === $site->user_id;
        });
    }
}
