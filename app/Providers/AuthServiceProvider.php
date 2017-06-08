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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Events
        Gate::define('event_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('event_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('event_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('event_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('event_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Tickets
        Gate::define('ticket_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ticket_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('ticket_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('ticket_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ticket_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Payments
        Gate::define('payment_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('payment_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('payment_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

    }
}
