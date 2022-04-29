<?php

namespace App\Providers;

use App\Services\CsvParserService;
use App\Services\XmlParserService;
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
        $this->app->bind(CsvParserService::class, function ($app) {
            return new CsvParserService();
        });

        $this->app->bind(XmlParserService::class, function ($app) {
            return new XmlParserService();
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
