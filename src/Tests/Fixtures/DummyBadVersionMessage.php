<?php


namespace Jhyangxyz\MessengerVersionControl\Tests\Fixtures;


use Jhyangxyz\MessengerVersionControl\Message\AbstractVersionedMessage;

class DummyBadVersionMessage extends AbstractVersionedMessage
{
    public function __construct()
    {
        $this->setVersion(2);
    }

    public function getBuildVersion(): int
    {
        return 1;
    }
}
