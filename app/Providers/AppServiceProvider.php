<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\SocialLink;
use App\Models\WebsiteSetting;
use Illuminate\Support\ServiceProvider;

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
        if (!app()->runningInConsole()) {
            view()->share('website_setting', WebsiteSetting::active()->first());
            view()->share('categories', Category::active()->get());
            view()->share('sociallinks', SocialLink::active()->get());
        }
    }
}
