<?php
/**
 * This page shows new developments of the site.
 */

use nligems\page\NewsPage;

require __DIR__ . '/autoload.php';

$Page = new NewsPage();

echo (string)$Page;
