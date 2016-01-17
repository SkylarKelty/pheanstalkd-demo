<?php
/**
 * This file describes a Pheanstalk worker
 */

require_once(dirname(__FILE__) . "/vendor/autoload.php");

use Pheanstalk\Pheanstalk;

array_shift($argv);
$args = implode(' ', $argv);

$pheanstalk = new Pheanstalk('127.0.0.1');

$pheanstalk
  ->useTube('testtube')
  ->put($args);
