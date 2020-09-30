<?php


namespace Message;


use Jhyangxyz\MessengerVersionControl\Message\AbstractVersionedMessage;
use PHPUnit\Framework\TestCase;

class AbstractVersionedMessageTest extends TestCase
{
    public function testIsVersionSupported() {
        $testMessage = new TestingVersionedMessage();
        $this->assertFalse($testMessage->isVersionSupported());
    }
}

class TestingVersionedMessage extends AbstractVersionedMessage {

    public function __construct()
    {
        $this->setVersion(2);
    }

    public function getBuildVersion(): int
    {
        return 1;
    }
}
