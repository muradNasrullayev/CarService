<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer('web.widgets.testimonials', function ($view) {
            $testimonials = Testimonial::query()
                ->select('id', DB::raw('CONCAT(first_name, " ", last_name) AS full_name'), 'image', 'profession', 'feedback')
                ->orderBy('id', 'desc')
                ->take(4)
                ->get();

            $view->with('testimonials', $testimonials);
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
    }
}
