<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
            require_once($filename);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $basename=basename(base_path());
        if ($basename != config('app.name')) {
            envu(['APP_NAME' => $basename]);
            envu(['ASSET_URL'=>request()->getSchemeAndHttpHost().'/company'.'/'.$basename.'/public']);
        }
    }
}
