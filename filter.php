<?php
/**
 * This page allows you to filter systems based on their features.
 */

use nligems\api\NliSystemApi;
use nligems\api\PageApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();
$PageApi = new PageApi();

$Page = $PageApi->getFilterPage($NliSystemApi);

echo (string)$Page;

$PageApi->setSecondaryPage('filter');