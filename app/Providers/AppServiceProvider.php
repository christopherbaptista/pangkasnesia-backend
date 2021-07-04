<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductGalleryRepository;
use App\Repositories\ProductGalleryRepositoryInterface;
use App\Repositories\ServiceRepository;
use App\Repositories\ServiceRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            ProductGalleryRepositoryInterface::class,
            ProductGalleryRepository::class
        );
        $this->app->bind(
            ServiceRepositoryInterface::class,
            ServiceRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultstringLength(191);
    }
}
