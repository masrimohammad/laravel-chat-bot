<?php

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
     * make sure that this env param resolves to the public path in which you host the context file as a txt file
     */
    'context_path' => env('CHAT_BOT_CONTEXT_PATH'),
];
