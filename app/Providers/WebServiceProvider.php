<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class WebServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        view()->composer(['web.layouts.footer', 'web.layouts.header'],
            function ($view) {
                $view->with(['setting' => Setting::query()->find(1)]);
            });
    }
}
