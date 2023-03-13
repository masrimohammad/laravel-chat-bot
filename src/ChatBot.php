<?php
namespace ChatBot;

class ChatBot
{
    public function ask($question): string
    {
        $chatBot = new ChatBotManager();
        return $chatBot->ask($question);
    }
}
