<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class pen07ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/pen07/ImgFile.php';
    }
}
