<?php


namespace Jhyangxyz\MessengerVersionControl\Tests\Message;


use Jhyangxyz\MessengerVersionControl\Tests\Fixtures\DummyBadVersionMessage;
use Jhyangxyz\MessengerVersionControl\Tests\Fixtures\DummyGoodVersionMessage;
use PHPUnit\Framework\TestCase;

class VersionedMessageTest extends TestCase
{
    public function testIsVersionSupported() {
        $testMessage = new DummyBadVersionMessage();
        $this->assertFalse($testMessage->isVersionSupported());

        $testMessage = new DummyGoodVersionMessage();
        $this->assertTrue($testMessage->isVersionSupported());
    }
}
