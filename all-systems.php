<?php
/**
 * This page shows new developments of the site.
 */

use nligems\api\PageApi;

require __DIR__ . '/autoload.php';

$PageApi = new PageApi();

$Page = $PageApi->getAllSystemsPage();

echo (string)$Page;

$PageApi->setSecondaryPage('all-systems');