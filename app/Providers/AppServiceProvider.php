<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        Blade::directive('currency', function ($expression) {
            return "<?php echo number_format($expression,0); ?>";
        });
        Blade::directive('rupiah', function ($expression) {
            return "Rp. <?php echo number_format($expression,0);?>";
        });

        Schema::defaultStringLength(191);
    }
}
