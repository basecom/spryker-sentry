<?php

/**
 * Copyright (c) basecom GmbH & Co. KG
 * Licensed under the MIT License
 */

namespace Basecom\Zed\Sentry\Communication\Plugin\Application;

use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use function Sentry\init;

/**
 * @method \Basecom\Zed\Sentry\SentryConfig getConfig()
 */
class SentryApplicationPlugin extends AbstractPlugin implements ApplicationPluginInterface
{
    /**
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Spryker\Service\Container\ContainerInterface
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
