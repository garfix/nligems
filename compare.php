<?php

use nligems\api\NliSystemApi;
use nligems\api\PageApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();
$PageApi = new PageApi();

$systemIds = !empty($_REQUEST['system']) ? $_REQUEST['system'] : array();

$Page = $PageApi->getComparePage($systemIds);

echo (string)$Page;

$PageApi->setSecondaryPage('filter');