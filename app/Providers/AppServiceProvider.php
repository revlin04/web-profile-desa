<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;

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
        Schema::defaultStringLength(191);
        Paginator::useTailwind();
        Carbon::setLocale('id');
        Blade::directive('anonymizeName', function ($expression) {
            return "<?php echo ucfirst(substr($expression, 0, 1)) . str_repeat('*', max(strlen($expression) - 1, 0)); ?>";
        });
    }
}
