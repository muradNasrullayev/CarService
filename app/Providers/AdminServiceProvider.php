<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
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
        {
            view()->composer([ 'admin.layouts.header'],
                function ($view) {
                    $view->with('contacts', Contact::all());
                }
            );
        }
    }
}
