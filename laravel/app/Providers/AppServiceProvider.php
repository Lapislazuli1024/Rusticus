<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\Farmer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('IsFarmer', function (User $user) {
            return Farmer::where('user_id', $user->id)->exists();
        });

        Gate::define('IsCustomer', function (User $user) {
            return Customer::where('user_id', $user->id)->exists();
        });

        Gate::define('IsProductOwner', function (User $user, Product $product) {
            return $product->user_id === $user->id;
        });
    }
}
