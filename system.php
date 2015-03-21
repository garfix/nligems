<?php
/**
 * Shows a full description of a single system.
 */

use nligems\api\NliSystemApi;
use nligems\api\PageApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();
$PageApi = new PageApi();

$systemId = $_REQUEST['id'];

$System = $NliSystemApi->getSystem($systemId);
if (!$System) {
	die('System not found: ' . $systemId);
}

$Page = $PageApi->getSystemPage($System);

echo (string)$Page;
