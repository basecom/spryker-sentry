<?php

declare(strict_types=1);

namespace Basecom\Yves\SentryErrorLogger\Plugin\Application;

use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \basecom\Yves\SentryErrorLogger\SentryErrorLoggerConfig getConfig()
 */
class SentryErrorLoggerApplicationPlugin extends AbstractPlugin implements ApplicationPluginInterface
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
        \Sentry\init([
            'dsn' => $this->getConfig()->getSentryDsn(),
            'error_types' => E_ALL,
            'environment' => $this->getConfig()->getSentryEnvironment(),
        ]);
    }
}
