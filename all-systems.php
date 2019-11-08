<?php
/**
 * This page shows new developments of the site.
 */

use nligems\page\SystemsPage;

require __DIR__ . '/autoload.php';

$Page = new SystemsPage();

echo (string)$Page;
