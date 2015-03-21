<?php
/**
 * This systems overview backend page allows you to pick a system to edit it.
 */

use nligems\api\PageApi;

require __DIR__ . '/autoload.php';

$PageApi = new PageApi();

$Page = $PageApi->getSystemOverviewPage();

echo (string)$Page;
