<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepository;
use app\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{

    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];

    /**
     * Register services.
     * Esse método é executado pra ensinar o service container o que tem que fazer
     * Por exemplo, ligar uma interface a uma classe concreta
     */
//    public function register(): void
//    {
//        # ligar uma interface a uma classe concreta
//        $this->app->bind(SeriesRepository::class, EloquentSeriesRepository::class);
//    }
//    ao inves de usar dessa forma, passamos o array bindings e o laravel ajusta por debaixo dos panos
}
