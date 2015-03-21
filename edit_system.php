<?php
/**
 * This backend page allows you to edit the features of a system.
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

$Page = $PageApi->getEditSystemPage($System);

if (!empty($_POST)) {
	$Page->processPost($_POST);
}

echo (string)$Page;
