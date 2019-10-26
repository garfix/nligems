<?php
/**
 * This is the main page of the website.
 */

use nligems\page\IndexPage;

require __DIR__ . '/autoload.php';

$Page = new IndexPage();

echo (string)$Page;
