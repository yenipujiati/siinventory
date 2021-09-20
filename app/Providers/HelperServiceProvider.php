<?php


namespace App\Providers;
use Illuminate\Support\ServiceProvider;


class HelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        require_once app_path().'/Util/Helper.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
