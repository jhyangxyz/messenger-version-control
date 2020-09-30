<?php


namespace Jhyangxyz\MessengerVersionControl\Tests\Fixtures;


use Jhyangxyz\MessengerVersionControl\Message\VersionedMessageInterface;
use Jhyangxyz\MessengerVersionControl\MessageHandler\AbstractVersionedMessageHandler;

class DummyVersionedMessageHandler extends AbstractVersionedMessageHandler
{
    public function __invoke(VersionedMessageInterface $versionedMessage)
    {
        $this->checkVersion($versionedMessage);
    }
}
