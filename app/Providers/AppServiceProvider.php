<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'wr53s5rwkkq7fwv9',
                    'publicKey' => '3j9rxhmf54p4jn9j',
                    'privateKey' => '654df69b4b98da44ff4b98eaa3792c2b',

                ]
            );
        });
    }
}