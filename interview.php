<?php
/**
 * This page shows the interview (hopefully more later).
 */

use nligems\page\InterviewPage;

require __DIR__ . '/autoload.php';

$subject = isset($_GET['subject']) ? $_GET['subject'] : null;

$Page = new InterviewPage($subject);

echo (string)$Page;
