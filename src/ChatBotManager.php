<?php

namespace ChatBot;

use Illuminate\Support\Str;
use Orhanerday\OpenAi\OpenAi;

class ChatBotManager
{
    private $client;
    private $contextPath;

    function __construct()
    {
        $this->client = new OpenAi(config('chat-bot.open_ai_api_key'));
        $this->contextPath = config('chat-bot.context_path');
    }

    public function ask(string $question): string
    {
        $prompt = $this->buildPrompt($question);
        $answer = $this->queryOpenAi($prompt, "\n", 0.7);

        return Str::of($answer)
            ->trim()
            ->trim('"');
    }

    protected function buildPrompt(string $question): string
    {
        $context = $this->resolveContext();

        $prompt = (string)view('chat-bot::prompts.ask', [
            'question' => $question,
            'context' => $context,
        ]);

        return rtrim($prompt, PHP_EOL);
    }

    protected function resolveContext(): string
    {
        if (file_exists(public_path($this->contextPath))) {
            return file_get_contents(public_path($this->contextPath));
        } else {
            return "";
        }
    }

    protected function queryOpenAi(string $prompt, string $stop, float $temperature = 0.0)
    {
        $completions = $this->client->completion([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => $temperature,
            'max_tokens' => 500,
        ]);
        $completions = json_decode($completions);

        return $completions->choices[0]->text;
    }
}
