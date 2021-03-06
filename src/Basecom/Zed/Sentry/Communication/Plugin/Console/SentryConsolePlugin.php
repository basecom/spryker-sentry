<?php

/**
 * Copyright (c) basecom GmbH & Co. KG
 * Licensed under the MIT License
 */

namespace Basecom\Zed\Sentry\Communication\Plugin\Console;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use function Sentry\captureException;
use function Sentry\init;

/**
 * @method \Basecom\Zed\Sentry\SentryConfig getConfig()
 */
class SentryConsolePlugin extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @api
     *
     * @param \Symfony\Component\Console\Event\ConsoleErrorEvent $event
     *
     * @return void
     */
    public function onConsoleError(ConsoleErrorEvent $event)
    {
        if ($this->getConfig()->getSentryDsn() !== '') {
            init([
                'dsn' => $this->getConfig()->getSentryDsn(),
                'error_types' => $this->getConfig()->getSentryErrorTypes(),
                'environment' => $this->getConfig()->getSentryEnvironment(true),
            ]);

            captureException($event->getError());
        }
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            ConsoleEvents::ERROR => ['onConsoleError'],
        ];
    }
}
