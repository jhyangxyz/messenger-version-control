<?php


namespace Jhyangxyz\MessengerVersionControl\MessageHandler;



use App\Exception\VersionNotSupportedException;
use Jhyangxyz\MessengerVersionControl\Message\VersionedMessageInterface;

interface VersionedMessageHandlerInterface
{
    /**
     * Does this Message Handler support this identifier and version?
     *
     * @throws VersionNotSupportedException
     */
    public function checkVersion(VersionedMessageInterface $versionedMessage): void;
}
