<?php
/**
 * This page shows new developments of the site.
 */

use nligems\page\AllSystemsPage;

require __DIR__ . '/autoload.php';

$Page = new AllSystemsPage();

echo (string)$Page;
