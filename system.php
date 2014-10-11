<?php

use nligems\api\NliSystemApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();
$ComponentApi = new \nligems\api\ComponentApi();
$LinkApi = new \nligems\api\LinkApi();

$systemId = $_REQUEST['id'];

$System = $NliSystemApi->getSystem($systemId);
if (!$System) {
	die('System not found: ' . $systemId);
}

$body = $System->getName();

$authorHtml = '';

foreach ($System->getContributors() as $contributor) {
	$src = $LinkApi->getLink('image', array('name' => $contributor));
	$authorHtml .= "<img src='$src' width='100' height='133'/>";
}

$body .= $authorHtml;

// getName()
// getNameDescription()
// getLongDescription()
// getFirstYear()
// getLastYear()
// getInstitutions()
// getInfluences()
// getNaturalLanguages()
// getProgrammingLanguages()
// getWebsite()
// getKnowledgeBaseType()
// getKnowledgeBaseTypeDescription()
// getSentenceTypes()
// getArticles()
// getContributors()

$page = file_get_contents(__DIR__ . '/nligems.html');

$page = str_replace('##body##', $body, $page);

echo $page;