<?php
/**
 * This file describes a Pheanstalk worker
 */

require_once(dirname(__FILE__) . "/vendor/autoload.php");

use Pheanstalk\Pheanstalk;

$pheanstalk = new Pheanstalk('127.0.0.1');
$pheanstalk->watch('testtube');

while ($job = $pheanstalk->reserve()) {
	$pheanstalk->delete($job);

	$data = $job->getData();
	echo "$data \n";

	if ($data == 'kill') {
		break;
	}
}

