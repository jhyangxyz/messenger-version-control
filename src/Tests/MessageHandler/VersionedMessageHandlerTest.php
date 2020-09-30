<?php


namespace Jhyangxyz\MessengerVersionControl\Tests\MessageHandler;


use Jhyangxyz\MessengerVersionControl\Exception\VersionNotSupportedException;
use Jhyangxyz\MessengerVersionControl\Tests\Fixtures\DummyBadVersionMessage;
use Jhyangxyz\MessengerVersionControl\Tests\Fixtures\DummyGoodVersionMessage;
use Jhyangxyz\MessengerVersionControl\Tests\Fixtures\DummyVersionedMessageHandler;
use PHPUnit\Framework\TestCase;

class VersionedMessageHandlerTest extends TestCase
{
    public function testVersionNotSupportedException()
    {
        $badVersionMessage = new DummyBadVersionMessage();

        // we create an instance of the DummyVersionedMessageHandler
        $dummyMessageHandler = new DummyVersionedMessageHandler();

        $this->expectException(VersionNotSupportedException::class);

        // now we trigger the invoke method
        $dummyMessageHandler($badVersionMessage);
    }


    public function testVersionSupportedExeption()
    {
        $badVersionMessage = new DummyGoodVersionMessage();

        // we create an instance of the DummyVersionedMessageHandler
        $dummyMessageHandler = new DummyVersionedMessageHandler();

        try {
            $dummyMessageHandler($badVersionMessage);
        } catch (VersionNotSupportedException $notExpected) {
            $this->fail();
        }

        $this->assertTrue(TRUE);
    }
}
