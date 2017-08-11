<?php
/**
 * This page shows the elements that together build an NLI system.
 */

use nligems\api\NliSystemApi;
use nligems\api\PageApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();
$PageApi = new PageApi();

$Page = $PageApi->getNliSystemPage();

echo (string)$Page;

$PageApi->setSecondaryPage('nli-system');