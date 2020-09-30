<?php


namespace Jhyangxyz\MessengerVersionControl\Message;


abstract class AbstractVersionedMessage implements VersionedMessageInterface
{
    /**
     * @var int
     */
    protected $version;

    protected function setVersion(int $forceVersion = null): void
    {
        $this->version = null === $forceVersion ? $this->getBuildVersion() : $forceVersion;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function isVersionSupported(): bool
    {
        // TODO: Implement isVersionSupported() method.
        return $this->getVersion() === $this->getBuildVersion();
    }
}
