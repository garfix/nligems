<?php

use nligems\api\ComponentApi;
use nligems\api\NliSystemApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();
$ComponentApi = new ComponentApi();

$systems = $NliSystemApi->getAllSystems();
$SystemInfo = $NliSystemApi->getSystemInformation();

$cats = array(
	'NP', 'VP', 'PP',	'DP', 'AP', 'RC', 'NEG', 'CONJ', 'ANAPHORA', 'AUX', 'MODALS', 'COMP-EXP', 'PASSIVES', 'CLEFTS', 'THERE', 'ELLIPSIS'
);

$Table = $ComponentApi->createTable(count($systems), count($cats));
$Table->setCaption('Language construct support');
$Table->setClass('data');

foreach ($cats as $row => $cat) {
	$Table->setHeader($row, $NliSystemApi->getFeatureName($cat));
}

foreach ($systems as $row => $System) {

	$Table->setSideHeader($row, $System->getName());

	foreach ($cats as $col => $cat) {

		$value = $System->getValue($cat);

		$Table->set($row, $col, $value == 'yes' ? 'yes' : '');

	}
}

$body = (string)$Table;

$page = file_get_contents(__DIR__ . '/nligems.html');

$page = str_replace('##body##', $body, $page);

echo $page;