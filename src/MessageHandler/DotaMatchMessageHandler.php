<?php


namespace App\MessageHandler;


use App\Message\DotaMatchMessage;
use mysql_xdevapi\Exception;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class DotaMatchMessageHandler implements MessageHandlerInterface
{

    public function __invoke(DotaMatchMessage $message)
    {
        echo $message->getMatchId();

        throw new \Exception('baad');
    }
}