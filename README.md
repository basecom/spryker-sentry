# basecom/spryker-sentry
Composer package for php-level sentry logging in Spryker

## Installation
Install via composer
```
$ composer require basecom/spryker-sentry
```

## Integraion

...


## Configuration

```
<?php

use Basecom\Shared\Sentry\SentryConstants;

...

// Full sentry DSN
$config[SentryConstants::SENTRY_DSN] = 'https://###@###.ingest.sentry.io/###';

// Set alternative environment names (per Layer), defaults to $APPLICATION_ENV when not set
$config[SentryConstants::SENTRY_ENVIRONMENT_ZED] = 'stage_zed';
$config[SentryConstants::SENTRY_ENVIRONMENT_GLUE] = 'stage_glue';
$config[SentryConstants::SENTRY_ENVIRONMENT_YVES] = 'stage_yves';

// Error types which should be logged
$config[SentryConstants::SENTRY_ERROR_TYPES] = E_ALL ^ E_DEPRECATED ^ E_USER_DEPRECATED
```
