<?php

declare(strict_types=1);

namespace Basecom\Yves\SentryErrorLogger;

class SentryErrorLoggerConstants
{
    /**
     * Specification:
     * - Configure the Sentry DSN where to publish to
     */
    public const SENTRY_DSN = 'YVES_SENTRY_ERROR_LOGGER_DSN';

    /**
     * Specification:
     * - Set the environment variable to be displayed in Sentry as the current system
     */
    public const SENTRY_ENVIRONMENT = 'YVES_SENTRY_ERROR_LOGGER_ENVIRONMENT';
}
