<?php

use nligems\api\NliSystemApi;
use nligems\api\PageApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();
$PageApi = new PageApi();

$Page = $PageApi->getFilterPage($NliSystemApi);

echo (string)$Page;