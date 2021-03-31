<?php

declare(strict_types=1);

namespace Basecom\Yves\SentryErrorLogger;

use Spryker\Shared\Kernel\AbstractBundleConfig;

class SentryErrorLoggerConfig extends AbstractBundleConfig
{
    /**
     * @return string|null
     */
    public function getSentryDsn(): ?string
    {
        return $this->get(SentryErrorLoggerConstants::SENTRY_DSN, '');
    }

    /**
     * @return string
     */
    public function getSentryEnvironment(): string
    {
        return $this->get(SentryErrorLoggerConstants::SENTRY_ENVIRONMENT, APPLICATION_ENV);
    }
}
