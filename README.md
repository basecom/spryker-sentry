# basecom Spryker Sentry

Sentry error monitoring for Spryker.

## Installation


## Configuration
Add credentials in the configuration file.

````php
use Pyz\Yves\SentryErrorLogger\SentryErrorLoggerConstants as YvesSentryErrorLoggerConstants;

$config[YvesSentryErrorLoggerConstants::SENTRY_ENVIRONMENT] = 'stage_yves';
$config[YvesSentryErrorLoggerConstants::SENTRY_DSN] = 'https://xxxxxxxxxxx.xx';
````

Add plugin to the ``YvesApplicationDependencyProvider.php`` files ``getApplicationPlugins()`` method.
````php
new SentryErrorLoggerApplicationPlugin()
````
