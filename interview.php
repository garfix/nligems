<?php
/**
 * This page shows new developments of the site.
 */

use nligems\page\InterviewPage;

require __DIR__ . '/autoload.php';

$Page = new InterviewPage();

echo (string)$Page;
