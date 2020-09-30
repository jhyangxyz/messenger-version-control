<?php


namespace Jhyangxyz\MessengerVersionControl\Middleware;


use Jhyangxyz\MessengerVersionControl\Exception\VersionNotSupportedException;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;
use Symfony\Component\Messenger\Stamp\DelayStamp;

class VersionCheckerMiddleware implements MiddlewareInterface
{

    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        // TODO: Implement handle() method.
        try {
            $envelope = $stack->next()->handle($envelope, $stack);

            return $envelope;
        } catch (\Throwable $exception) {
            if ($exception instanceof HandlerFailedException) {

                $nestedExceptions = $exception->getNestedExceptions();
                if (count($nestedExceptions) > 0) {
                    foreach ($nestedExceptions as $nestedException) {
                        if ($nestedException instanceof VersionNotSupportedException) {

                            $this->bus->dispatch($envelope->getMessage(), [
                                // wait 5 seconds before processing
                                new DelayStamp(5000)
                            ]);

                            return $envelope;
                        }
                    }
                }
            }

            throw $exception;
        }
    }
}
