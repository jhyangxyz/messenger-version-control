<?php


namespace Jhyangxyz\MessengerVersionControl\Tests\Middleware;


use Jhyangxyz\MessengerVersionControl\Middleware\VersionCheckerMiddleware;
use Jhyangxyz\MessengerVersionControl\Tests\Fixtures\DummyGoodVersionMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Test\Middleware\MiddlewareTestCase;

class VersionCheckerMiddlewareTest extends MiddlewareTestCase
{
    public function testCorrectVersionMessage(): void
    {
        $message = new DummyGoodVersionMessage();
        $envelope = new Envelope($message);

        $bus = $this->createMock(MessageBusInterface::class);
        $bus
            ->expects($this->never())
            ->method('dispatch');

        (new VersionCheckerMiddleware($bus))->handle($envelope, $this->getStackMock());

    }
}
