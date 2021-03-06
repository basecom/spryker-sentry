<?php

use Basecom\Shared\Sentry\SentryConstants;
use Spryker\Shared\Kernel\KernelConstants;

// add basecom to kernel namespaces
$config[KernelConstants::CORE_NAMESPACES][] = 'Basecom';

// full sentry DSN. if empty, sentry logging is disabled in this config / environment
$config[SentryConstants::SENTRY_DSN] = 'https://###@###.ingest.sentry.io/###';

// set alternative environment names (per Layer), defaults to $APPLICATION_ENV when not set
$config[SentryConstants::SENTRY_ENVIRONMENT_ZED] = 'stage_zed';
$config[SentryConstants::SENTRY_ENVIRONMENT_GLUE] = 'stage_glue';
$config[SentryConstants::SENTRY_ENVIRONMENT_YVES] = 'stage_yves';
$config[SentryConstants::SENTRY_ENVIRONMENT_CONSOLE] = 'stage_console';

// error types which should be logged
$config[SentryConstants::SENTRY_ERROR_TYPES] = E_ALL ^ E_DEPRECATED ^ E_USER_DEPRECATED;
