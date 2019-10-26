<?php
/**
 * This page shows the elements that together build an NLI system.
 */

use nligems\page\InternalsPage;

require __DIR__ . '/autoload.php';

$Page = new InternalsPage();

echo (string)$Page;
