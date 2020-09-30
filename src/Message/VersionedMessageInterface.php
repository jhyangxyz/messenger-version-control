<?php


namespace Jhyangxyz\MessengerVersionControl\Message;


interface VersionedMessageInterface
{
    /**
     * The version of the message.
     */
    public function getVersion(): int;

    /**
     * The version of the current build
     */
    public function getBuildVersion(): int;

    /**
     * Is this version supported or not by the current build
     */
    public function isVersionSupported(): bool;
}
