<?php


namespace App\MessageHandler\Dota\Steam;


use App\Message\Dota\Steam\MatchMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class MatchMessageHandler implements MessageHandlerInterface
{
    public function __invoke(MatchMessage $matchMessage)
    {
        // TODO: Implement __invoke() method.
    }
}