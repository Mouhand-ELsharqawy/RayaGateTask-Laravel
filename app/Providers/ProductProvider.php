<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Patterns\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductInterface::class,ProductRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
