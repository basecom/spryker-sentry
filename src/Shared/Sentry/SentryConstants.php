<?php

/**
 * Copyright (c) basecom GmbH & Co. KG
 * Licensed under the MIT License
 */

namespace Basecom\Shared\Sentry;

interface SentryConstants
{
    /**
     * Specification:
     * - Configure the Sentry DSN where to publish to
     * - type string
     * - default ''
     *
     * @api
     */
    public const SENTRY_DSN = 'SENTRY_ERROR_LOGGER_DSN';

    /**
     * Specification:
     * - set error types to report
     * - type int
     * - default E_ALL
     *
     * @api
     */
    public const SENTRY_ERROR_TYPES = 'SENTRY_ERROR_TYPES';

    /**
     * Specification:
     * - Set the environment variable to be displayed in Sentry as the current system
     * - type string
     * - default APPLICATION_ENV
     *
     * @api
     */
    public const SENTRY_ENVIRONMENT_GLUE = 'GLUE_SENTRY_ERROR_LOGGER_ENVIRONMENT';

    /**
     * Specification:
     * - Set the environment variable to be displayed in Sentry as the current system
     * - type string
     * - default APPLICATION_ENV
     *
     * @api
     */
    public const SENTRY_ENVIRONMENT_ZED = 'ZED_SENTRY_ERROR_LOGGER_ENVIRONMENT';

    /**
     * Specification:
     * - Set the environment variable to be displayed in Sentry as the current system
     * - type string
     * - default APPLICATION_ENV
     *
     * @api
     */
    public const SENTRY_ENVIRONMENT_YVES = 'YVES_SENTRY_ERROR_LOGGER_ENVIRONMENT';
}
