<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Helpers\NodeHelper;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

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
        view()->composer('*', function ($view) {
            $view->with('shortcodes', [
                'card' => function ($attributes) {
                    $scriptPath = base_path('node/render-card.js');
                    return NodeHelper::execute($scriptPath, $attributes);
                },
            ]);
        });

        $settings = Cache::remember('site_settings', 60 * 60, function () {
            return Setting::first();
        });

        View::share('settings', $settings);

        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        Paginator::useBootstrap();
    }
}
