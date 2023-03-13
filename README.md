# Laravel Chat Bot:
This package allows you to build a chat-bot based on a context that you provide helping your users understand how your system operates, powered OpenAI's GPT-3.
Keep in mind that the more you describe under the context, the more your reliable your chat-bot will be

```php
$chatBot = new ChatBot();
$chatBot->ask('How can i integrate my shopify e-commerce store?');
```

## Installation

You can install the package via composer.
By default, Composer pulls in packages from Packagist, so you’ll have to make a slight adjustment to your new project composer.json file.
Open the file and update include the following array somewhere in the object:

```bash
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/masrimohammad/laravel-chat-bot"
    }
]
```

```bash
composer require ai/chat-bot
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="chat-bot"
```

This is the contents of the published config file:

```php
return [
    /**
     * Package name
     */
    'name' => 'Chat-Bot',

    /**
     * Open AI api key
     */
    'open_ai_api_key' => env('CHAT_BOT_OPEN_AI_API_KEY'),

    /**
     * The context you would like to feed your AI bot with so that
     * customers can interact with the bot based on
     *
     * make sure that this env param resolves to a path in which you host the context file as a txt file 
     */
    'context_path' => env('CHAT_BOT_CONTEXT_PATH'),
];
```

## Usage

First, you need to configure your OpenAI API key in your `.env` file:

```dotenv
CHAT_BOT_OPEN_AI_API_KEY=sk-...
CHAT_BOT_CONTEXT_PATH=../../context.txt
```

Then, you can use the `ChatBot::ask()` method to ask the chat-bot:

```php
$chatBot = new ChatBot();
$chatBot->ask('How can i reach out to customer support?');
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
