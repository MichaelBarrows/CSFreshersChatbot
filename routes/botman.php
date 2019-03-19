<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello');
});

/**
 * Triggers the conversation with the user.
 */
$botman->hears('Hello', BotManController::class.'@startChatbotConversation');
