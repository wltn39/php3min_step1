<?php

require 'vendor/autoload.php';

use \Monolog\Logger as Logger;
use Monolog\Handler\StreamHandler;
$log =  new Logger('name');
$log->pushHandler(new StreamHandler('my.log', Logger::INFO));
// add records to the log
$log->addInfo('Info log');