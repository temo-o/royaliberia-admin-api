<?php

error_reporting(E_ALL & ~E_DEPRECATED);

// Ensure deprecated warnings are not displayed but logged
ini_set('display_errors', '0');
ini_set('log_errors', '1');

use App\Kernel;
// Custom error handler to handle deprecated warnings
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return false;
    }

    switch ($errno) {
        case E_DEPRECATED:
        case E_USER_DEPRECATED:
            // Log the deprecation warning but do not display it
            error_log("Deprecated: $errstr in $errfile on line $errline");
            return true;
        default:
            // Handle other errors as usual
            return false;
    }
});

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
