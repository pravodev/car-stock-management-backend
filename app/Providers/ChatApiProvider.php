<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mike4ip\ChatApi;

class ChatApiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('chat-api', function(){
            return new ChatApi(
                config('chat-api.token'),
                config('chat-api.api_url')
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
