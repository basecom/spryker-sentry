<?php

/**
 * Copyright (c) basecom GmbH & Co. KG
 * Licensed under the MIT License
 */

namespace Basecom\Glue\Sentry\Plugin\Application;

use Basecom\Glue\Sentry\SentryConfig;
use Spryker\Glue\Kernel\AbstractPlugin;
use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface;
use function Sentry\init;

/**
 * @method SentryConfig getConfig()
 */
class SentryApplicationPlugin extends AbstractPlugin implements ApplicationPluginInterface
{
    /**
     * @param ContainerInterface $container
     *
     * @return ContainerInterface
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
