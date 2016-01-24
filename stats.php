<?php
/**
 * This file describes a Pheanstalk stats client.
 */

require_once(dirname(__FILE__) . "/vendor/autoload.php");

use Pheanstalk\Pheanstalk;

// Create a new connection to pheanstalk.
$pheanstalk = new Pheanstalk('127.0.0.1');

// Grab stats
$stats = $pheanstalk->stats();
print_r($stats);
