<?php
/**
 * Show significant events in the history of nli's.
 */

use nligems\api\NliSystemApi;
use nligems\page\TimeLinePage;

require __DIR__ . '/autoload.php';

$Page = new TimeLinePage(new NliSystemApi());

echo (string)$Page;
