<?php

namespace App\Providers;

use App\Services\ParserCsvService;
use App\Services\ParserXlsxService;
use App\Services\ParserXmlService;
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
        $this->app->bind(ParserCsvService::class, function ($app) {
            return new ParserCsvService();
        });

        $this->app->bind(ParserXmlService::class, function ($app) {
            return new ParserXmlService();
        });

        $this->app->bind(ParserXlsxService::class, function ($app) {
            return new ParserXlsxService();
        });
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
