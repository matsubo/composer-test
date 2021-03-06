<?php

require 'vendor/autoload.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('/tmp/monolog.log', Logger::WARNING));

// add records to the log
$log->addWarning('Foo');
$log->addError('Bar');

try {
	throw new Exception('exception');
} catch (Exception $e) {
	$log->addWarning($e);
}
