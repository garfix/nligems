<?php

use nligems\api\PageApi;

require __DIR__ . '/autoload.php';

$PageApi = new PageApi();

$Page = $PageApi->getIndexPage();

echo (string)$Page;
