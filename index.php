<?php
/**
 * This is the main page of the website.
 */

use nligems\api\NliSystemApi;
use nligems\page\IndexPage;
use nligems\page\InternalsPage;
use nligems\page\InterviewPage;
use nligems\page\NewsPage;
use nligems\page\SystemsPage;
use nligems\page\TimeLinePage;

require __DIR__ . '/autoload.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'index';

if ($page === "index") {
    $Page = new IndexPage();
} elseif ($page === "internals") {
    $Page = new InternalsPage();
} elseif ($page === "all-systems") {
    $Page = new SystemsPage();
} elseif ($page === "timeline") {
    $Page = new TimeLinePage(new NliSystemApi());
} elseif ($page === "news") {
    $Page = new NewsPage();
} elseif ($page === "interview") {
    $subject = isset($_GET['subject']) ? $_GET['subject'] : null;
    $Page = new InterviewPage($subject);
} else {
    die("Unknown page: " . $page);
}

echo (string)$Page;
