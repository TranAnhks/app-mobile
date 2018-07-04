<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('includes.menu',function($view){
            $loai_sp=Category::all();
            //$view->with('loai_sp',$loai_sp);
            $view->with('loai_sp',$loai_sp);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\Contracts\UserInterface',
            'App\Repositories\Eloquents\UserRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\PageInterface',
            'App\Repositories\Eloquents\PageRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\CartInterface',
            'App\Repositories\Eloquents\CartRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\OrderInterface',
            'App\Repositories\Eloquents\OrderRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\LanguageInterface',
            'App\Repositories\Eloquents\LanguageRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\CategoryInterface',
            'App\Repositories\Eloquents\CategoryRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\CustomerInterface',
            'App\Repositories\Eloquents\CustomerRepository'
        );

         $this->app->bind(
            'App\Repositories\Contracts\ProductInterface',
            'App\Repositories\Eloquents\ProductRepository'
        );

    }
}
