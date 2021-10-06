<?php

/**
 * Copyright (c) basecom GmbH & Co. KG
 * Licensed under the MIT License
 */

namespace Basecom\Yves\Sentry\Plugin\Application;

use Basecom\Yves\Sentry\SentryConfig;
use Spryker\Service\Container\ContainerInterface;
use Spryker\Yves\ErrorHandler\Plugin\Application\ErrorHandlerApplicationPlugin as SprykerErrorHandlerApplicationPlugin;
use function Sentry\init;

/**
 * @method SentryConfig getConfig()
 */
class SentryApplicationPlugin extends SprykerErrorHandlerApplicationPlugin
{
    /**
     * @param ContainerInterface $container
     *
     * @return ContainerInterface
     *
     * @api
     */
    public function provide(ContainerInterface $container): ContainerInterface
    {
        if ($this->getConfig()->getSentryDsn() !== '') {
            $this->registerSentry();
        }

        return $container;
    }

    /**
     * @return void
     */
    protected function registerSentry(): void
    {
        init([
            'dsn' => $this->getConfig()->getSentryDsn(),
            'error_types' => $this->getConfig()->getSentryErrorTypes(),
            'environment' => $this->getConfig()->getSentryEnvironment(),
        ]);
    }
}
