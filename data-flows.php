<?php

use nligems\api\ComponentApi;
use nligems\api\NliSystemApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();
$ComponentApi = new ComponentApi();

$systems = $NliSystemApi->getAllSystems();
$SystemInfo = $NliSystemApi->getSystemInformation();

$Table = $ComponentApi->createTable(13, count($systems));
$Table->setCaption('Data flow charts');
$Table->treatCellContentsAsHtml();
$Table->setClass('dataflow');

$col = 0;

foreach ($systems as $id => $System) {

	$Table->setHeader($col, $System->getName());

	$value = (string)$ComponentApi->createExternalEntity()->setContent("Natural Language input");
	$Table->set(0, $col, $value);

	$header = "Tokenize";

	if ($name = $System->getTokenizerName()) {
		$header .= "\n\"" . $name . "\"";
	}

	$Bullets = $ComponentApi->createBullets();
	foreach ($System->getTokenizationProcesses() as $process) {
		$Bullets->addItem($process);
	}
	$content = (string)$Bullets;
	$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
	$Table->set(1, $col, $value);

	$value = (string)$ComponentApi->createDataStore()->setContent("Tokens");
	$Table->set(2, $col, $value);

	$header = "Parse";

	if ($name = $System->getParserName()) {
		$header .= "\n\"" . $name . "\"";
	}

	$List = $ComponentApi->createDefinitionList();

	if ($type = $System->getParserType()) {
		$List->addItem('Parser type', $type);
	}

	if ($type = $System->getGrammarType()) {
		$List->addItem('Grammar type', $type);
	}

	$content = (string)$List;

	$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
	$Table->set(3, $col, $value);

	$value = (string)$ComponentApi->createDataStore()->setContent("Syntactic form");
	$Table->set(4, $col, $value);

	$header = "Interpret";

	if ($name = $System->getInterpreterName()) {
		$header .= "\n\"" . $name . "\"";
	}

	$Bullets = $ComponentApi->createBullets();
	foreach ($System->getInterpretationProcesses() as $process) {
		$Bullets->addItem($process);
	}
	$content = (string)$Bullets;

	$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
	$Table->set(5, $col, $value);

	if ($System->useConverter()) {

		$content = "Semantic form";

		if ($name = $System->getSemanticFormName()) {
			$content .= "\n(" . $name . ")";
		}

		$Bullets = $ComponentApi->createBullets();
		foreach ($System->getSemanticOptions() as $process) {
			$Bullets->addItem($process);
		}

		if ($ontology = $System->useOntology()) {
			if ($ontology = $System->getStandardOntology()) {
				$Bullets->addItem("Ontology: " . $ontology);
			} else {
				$Bullets->addItem("Custom ontology");
			}
		}

		$content .= (string)$Bullets;

		$value = (string)$ComponentApi->createDataStore()->setContent($content);
		$Table->set(6, $col, $value);

		$header = "Convert";

		if ($name = $System->getConverterName()) {
			$header .= "\n\"" . $name . "\"";
		}

		$Bullets = $ComponentApi->createBullets();
		foreach ($System->getConversionProcesses() as $process) {
			$Bullets->addItem($process);
		}
		$content = (string)$Bullets;

		$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
		$Table->set(7, $col, $value);

	}

	$name = $System->getKnowledgeBaseLanguageName();

	$content = "Knowledge source form" . ($name ? "\n(" . $name . ")" : "");

	$Bullets = $ComponentApi->createBullets();
	foreach ($System->getKnowledgeBaseOptions() as $process) {
		$Bullets->addItem($process);
	}
	$content .= (string)$Bullets;

	$value = (string)$ComponentApi->createDataStore()->setContent($content);
	$Table->set(8, $col, $value);

	$header = "Execute";

	$content = '';
	$List = $ComponentApi->createDefinitionList();

	if ($name = $System->getExecuterName()) {
		$List->addItem('Knowledge Base', $name);
		$content = (string)$List;
	}

	$Bullets = $ComponentApi->createBullets();
	foreach ($System->getExecuterProcesses() as $process) {
		$Bullets->addItem($process);
	}
	$content .= (string)$Bullets;

	$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
	$Table->set(9, $col, $value);


	$value = (string)$ComponentApi->createDataStore()->setContent("Knowledge base answers");
	$Table->set(10, $col, $value);

	$header = "Answer";

	if ($name = $System->getAnswererName()) {
		$header .= "\n\"" . $name . "\"";
	}

	$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent('');
	$Table->set(11, $col, $value);

	$value = (string)$ComponentApi->createExternalEntity()->setContent("Natural Language output");
	$Table->set(12, $col, $value);

	$col++;
}

$body = (string)$Table;

$page = file_get_contents(__DIR__ . '/nligems.html');

$page = str_replace('##body##', $body, $page);

echo $page;