<?php

namespace ChatBot\Providers;

use ChatBot\ChatBot;
use Illuminate\Support\ServiceProvider;

class ChatBotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(dirname(__DIR__, 1) . '/views', 'chat-bot');

        $this->publishes([
            dirname(__DIR__, 1) . '/config/chat-bot.php' => config_path('chat-bot.php')
        ], 'chat-bot');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(config('chat-bot.name'), function () {
            return new ChatBot();
        });
    }
}
