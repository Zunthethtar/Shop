<?php

namespace App\Providers;

use App\Interfaces\api\CategoryInterface as ApiCategoryInterface;
use App\Interfaces\api\ProductInterface as ApiProductInterface;
use App\Interfaces\BillInterface;
use App\Interfaces\OwnerInterface;
use App\Interfaces\ShopInterface;
use App\Repositories\api\CategoryRepository as ApiCategoryRepository;
use App\Repositories\api\ProductRepository as ApiProductRepository;

use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\SubCategoryInterface;
use App\Repositories\BillRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\OwnerRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ShopRepository;
use App\Repositories\SubCategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface ::class,CategoryRepository::class);
        $this->app->bind(ProductInterface ::class,ProductRepository::class);
        $this->app->bind(ApiCategoryInterface::class,ApiCategoryRepository::class);
        $this->app->bind(ApiProductInterface::class,ApiProductRepository::class);
        $this->app->bind(OwnerInterface ::class,OwnerRepository::class);
        $this->app->bind(BillInterface ::class,BillRepository::class);
        $this->app->bind(ShopInterface ::class,ShopRepository::class);
        $this->app->bind(SubCategoryInterface ::class,SubCategoryRepository::class);




    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
