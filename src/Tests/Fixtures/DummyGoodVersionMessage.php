<?php


namespace Jhyangxyz\MessengerVersionControl\Tests\Fixtures;


use Jhyangxyz\MessengerVersionControl\Message\AbstractVersionedMessage;

class DummyGoodVersionMessage extends AbstractVersionedMessage
{
    public function __construct()
    {
        $this->setVersion();
    }

    public function getBuildVersion(): int
    {
        return 1;
    }
}
