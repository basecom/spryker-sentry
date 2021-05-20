<?php

/**
 * Copyright (c) basecom GmbH & Co. KG
 * Licensed under the MIT License
 */

namespace Basecom\Zed\Sentry;

use Basecom\Shared\Sentry\SentryConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class SentryConfig extends AbstractBundleConfig
{
    /**
     * @return string|null
     */
    public function getSentryDsn(): ?string
    {
        return $this->get(SentryConstants::SENTRY_DSN, '');
    }

    /**
     * @return int
     */
    public function getSentryErrorTypes(): int
    {
        return (int)$this->get(SentryConstants::SENTRY_ERROR_TYPES, E_ALL ^ E_DEPRECATED ^ E_USER_DEPRECATED);
    }

    /**
     * @return string
     */
    public function getSentryEnvironment(): string
    {
        return $this->get(SentryConstants::SENTRY_ENVIRONMENT_ZED, APPLICATION_ENV);
    }
}
