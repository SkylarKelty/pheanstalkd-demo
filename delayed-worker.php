<?php
/**
 * This file describes a Pheanstalk worker
 */

require_once(dirname(__FILE__) . "/vendor/autoload.php");

use Pheanstalk\Pheanstalk;

// Create a new connection to pheanstalk.
$pheanstalk = new Pheanstalk('127.0.0.1');

// Watch the test tube.
$pheanstalk->watch('test');

// While we can reserve a job...
while ($job = $pheanstalk->reserve()) {
	sleep(5);

	// Process the data and write it to STDOUT.
	$data = $job->getData();
	echo "$data \n";

	// Delete the job from the queue.
	$pheanstalk->delete($job);

	sleep(5);

	// If the message was 'kill', exit this loop.
	if ($data == 'kill') {
		break;
	}
}

