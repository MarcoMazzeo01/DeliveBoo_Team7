<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'wr53s5rwkkq7fwv9',
                    'publicKey' => 'r3xqg3pmqy7p6s3s',
                    'privateKey' => '1e7b4c08ee1681a77c63b15fc0871597',

                ]
            );
        });
    }
}