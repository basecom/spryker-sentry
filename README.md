# basecom/spryker-sentry
spryker package to utilize sentry fo php-level error-logging in all layers

## Installation
Install via composer
```
$ composer require basecom/spryker-sentry
```

## Integration
1) Add Basecom to namespaces in _config_default.php_
```
$config[KernelConstants::CORE_NAMESPACES][] = 'Basecom';
```

2) Add corresponding `SentryApplicationPlugin` to every layer you want to log errors to sentry

**Glue**

Add `SentryApplicationPlugin` to `Pyz\Glue\GlueApplication\GlueApplicationDependencyProvider`
```
    protected function getApplicationPlugins(): array
    {
        return [
            ...
            new Basecom\Glue\Sentry\Plugin\Application\SentryApplicationPlugin(),
        ];
    }
```

**Zed**

Add `SentryApplicationPlugin` to `Pyz\Zed\Application\ApplicationDependencyProvider`
```
    protected function getApplicationPlugins(): array
    {
        return [
            ...
            new Basecom\Zed\Sentry\Communication\Plugin\Application\SentryApplicationPlugin(),
        ];
    }
```

**Yves**

Add `SentryApplicationPlugin` to `Pyz\Yves\ShopApplication\ShopApplicationDependencyProvider`
```
    protected function getApplicationPlugins(): array
    {
        return [
            ...
            new Basecom\Yves\Sentry\Plugin\Application\SentryApplicationPlugin(),
        ];
    }
```


## Configuration
Configure the sentry logger in config_*.php
```
<?php

use Basecom\Shared\Sentry\SentryConstants;

...

// full sentry DSN. if empty, sentry logging is disabled in this config / environment
$config[SentryConstants::SENTRY_DSN] = 'https://###@###.ingest.sentry.io/###';

// set alternative environment names (per Layer), defaults to $APPLICATION_ENV when not set
$config[SentryConstants::SENTRY_ENVIRONMENT_ZED] = 'stage_zed';
$config[SentryConstants::SENTRY_ENVIRONMENT_GLUE] = 'stage_glue';
$config[SentryConstants::SENTRY_ENVIRONMENT_YVES] = 'stage_yves';

// error types which should be logged
$config[SentryConstants::SENTRY_ERROR_TYPES] = E_ALL ^ E_DEPRECATED ^ E_USER_DEPRECATED
```
