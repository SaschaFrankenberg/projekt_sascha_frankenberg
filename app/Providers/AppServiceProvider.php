<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Workshop;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('is-Organizer', function (User $user) {
            return $user->role == 'organizer' ? Response::allow() : Response::deny('You are not an organizer');
        });
    }
}
