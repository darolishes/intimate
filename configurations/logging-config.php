```php
<?php
// configurations/logging-config.php

// Define the log levels
define('LOG_LEVEL_DEBUG', 0);
define('LOG_LEVEL_INFO', 1);
define('LOG_LEVEL_WARN', 2);
define('LOG_LEVEL_ERROR', 3);

// Define the log format
define('LOG_FORMAT', "[%datetime%] %level_name%: %message%\n");

// Define the log destination
define('LOG_FILE', __DIR__ . '/../logs/intimatetales.log');

// Include the Monolog library
require_once __DIR__ . '/../vendor/autoload.php';

// Create a log channel
$log = new Monolog\Logger('IntimateTales');

// Create a stream handler
$streamHandler = new Monolog\Handler\StreamHandler(LOG_FILE, Monolog\Logger::DEBUG);

// Create a formatter
$formatter = new Monolog\Formatter\LineFormatter(LOG_FORMAT);

// Set the formatter on the handler
$streamHandler->setFormatter($formatter);

// Push the handler onto the logger
$log->pushHandler($streamHandler);

// Return the logger
return $log;
```