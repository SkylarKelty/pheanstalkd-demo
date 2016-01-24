<?php
/**
 * This file describes a Pheanstalk client.
 */

require_once(dirname(__FILE__) . "/vendor/autoload.php");

use Pheanstalk\Pheanstalk;

// Create a new connection to pheanstalk.
$pheanstalk = new Pheanstalk('127.0.0.1');

// Use the test tube.
$pheanstalk->useTube('test');

// Grab command line arguments.
array_shift($argv);
$args = implode(' ', $argv);

// Send the command line args to pheanstalk.
for ($i = 0; $i < 1000; $i++) {
	$pheanstalk->put($args);
}
