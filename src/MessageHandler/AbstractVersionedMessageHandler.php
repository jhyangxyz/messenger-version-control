<?php


namespace Jhyangxyz\MessengerVersionControl\MessageHandler;


use Jhyangxyz\MessengerVersionControl\Exception\VersionNotSupportedException;
use Jhyangxyz\MessengerVersionControl\Message\VersionedMessageInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

abstract class AbstractVersionedMessageHandler implements VersionedMessageHandlerInterface, MessageHandlerInterface
{

    /**
     * @var MessageBusInterface $bus
     */
    private $bus;

    /**
     * @required
     * @param MessageBusInterface $bus
     */
    public function setBus(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function checkVersion(VersionedMessageInterface $versionedMessage): void
    {
       if (!$versionedMessage->isVersionSupported()) {
           throw new VersionNotSupportedException();
       }
    }
}
