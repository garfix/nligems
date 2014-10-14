<?php

use nligems\api\NliSystemApi;
use nligems\api\PageApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();
$PageApi = new PageApi();

$Page = $PageApi->getTimeLinePage($NliSystemApi);

echo (string)$Page;

$PageApi->setSecondaryPage('timeline');