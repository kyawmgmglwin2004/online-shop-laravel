<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Pagination\Paginator;

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
        // $this->registerPolicies();
        Paginator::useBootstrap();

        Gate::define('product-create', function($user){
            return $user->role === 'admin';
        });
        Gate::define('product-delete', function($user){
            return $user->role === 'admin';
        });
        Gate::define('product-edit', function($user){
            return $user->role === 'admin';
        });
        Gate::define('general', function($user){
            return $user->role === 'admin';
        });
    }
}
