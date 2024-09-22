<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class OpenAIServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('OpenAI', function ($app) {
            return new Client([
                'base_uri' => 'https://api.openai.com/v1/',
                'headers'  => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                    'Content-Type'  => 'application/json',
                ],
            ]);
        });
    }

    public function boot()
    {
        //
    }
}
