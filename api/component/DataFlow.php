<?php

namespace nligems\api\component;

use nligems\api\ComponentApi;
use nligems\api\Features;
use nligems\api\NliSystem;

/**
 * @author Patrick van Bergen
 */
class DataFlow
{
    /** NliSystem[] */
    private $systems = array();

	/** bool */
	private $showHeaders = true;

    public function addSystem(NliSystem $System)
    {
        $this->systems[] = $System;
    }

	/**
	 * @param $show
	 */
	public function setShowHeaders($show)
	{
		$this->showHeaders = $show;
	}

    public function __toString()
    {
        $ComponentApi = new ComponentApi();

        $Table = $ComponentApi->createTable(13, count($this->systems));
        $Table->treatCellContentsAsHtml();
        $Table->setClass('dataflow');
	    $Table->skipEmptyRows();

        $col = 0;

        /** @var NliSystem $System */
        foreach ($this->systems as $System) {

	        if ($this->showHeaders) {
		        $Table->setHeader($col, $System->getName());
	        }

        	$value = (string)$ComponentApi->createExternalEntity()->setContent("Natural Language input");
        	$Table->set(0, $col, $value);

	        $this->addTokenizeSection($ComponentApi, $System, $Table, $col, 1);
	        $this->addTokensSection($ComponentApi, $System, $Table, $col, 2);

	        if (!in_array(Features::OPTION_PATTERN_MATCHING, $System->get(Features::ANALYSIS))) {

		        $this->addParseSection($System, $ComponentApi, $Table, $col, 3);
		        $this->addSyntacticFormSection($System, $ComponentApi, $Table, $col, 4);
	        }

	        $this->addInterpretSection($System, $ComponentApi, $Table, $col, 5);

	        if (in_array(Features::OPTION_SEMANTICS_BASED, $System->get(Features::ANALYSIS))) {

		        $this->addSemanticFormSection($System, $ComponentApi, $Table, $col, 6);
		        $this->addConvertSection($System, $ComponentApi, $Table, $col, 7);
        	}

	        $this->addKbFormSection($System, $ComponentApi, $Table, $col, 8);
	        $this->addExecuteSection($ComponentApi, $System, $Table, $col, 9);

	        $this->addAnswerFormSection($ComponentApi, $Table, $col, 10);
	        $this->addAnswerSection($System, $ComponentApi, $Table, $col, 11);

        	$value = (string)$ComponentApi->createExternalEntity()->setContent("Natural Language output");
        	$Table->set(12, $col, $value);

        	$col++;
        }

        return (string)$Table;
    }

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addTokenizeSection($ComponentApi, $System, $Table, $col, $row)
	{
		$header = "Tokenize";

		$Bullets = $ComponentApi->createBullets();
		foreach ($System->getTokenizationProcesses() as $process) {
			$Bullets->addItem($process);
		}
		$content = (string)$Bullets;
		$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
		$Table->set($row, $col, $value);
	}

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addTokensSection($ComponentApi, $System, $Table, $col, $row)
	{
		$value = (string)$ComponentApi->createDataStore()->setContent("Tokens");
		$Table->set($row, $col, $value);
	}

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addParseSection($System, $ComponentApi, $Table, $col, $row)
	{
		$header = "Parse";

		if ($name = $System->get(Features::PARSE_HEADER)) {
			$header .= "\n\"" . $name . "\"";
		}

		$List = $ComponentApi->createDefinitionList();

		if ($type = $System->get(Features::PARSER_TYPE)) {
			$List->addItem('Parser type', $type);
		}

		if ($type = $System->get(Features::GRAMMAR_TYPE)) {
			$List->addItem('Grammar type', $type);
		}

		$content = (string)$List;

		$Bullets = $ComponentApi->createBullets();
		if ($System->get(Features::SEMANTIC_GRAMMAR)) {
			$Bullets->addItem('Semantic grammar (contains domain-specific information)');
		}
		$content .= (string)$Bullets;

		$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
		$Table->set($row, $col, $value);
	}


	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addSyntacticFormSection($System, $ComponentApi, $Table, $col, $row)
	{

		$value = (string)$ComponentApi->createDataStore()->setContent("Syntactic form");
		$Table->set($row, $col, $value);
	}

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addSemanticFormSection($System, $ComponentApi, $Table, $col, $row)
	{
		$content = "Semantic form";

		if ($name = $System->get(Features::SEMANTIC_FORM_DESC)) {
			$content .= "\n(" . $name . ")";
		}

		$Bullets = $ComponentApi->createBullets();
		foreach ($System->getSemanticOptions() as $process) {
			$Bullets->addItem($process);
		}

		if ($ontology = $System->get(Features::ONTOLOGY_USED)) {
			if ($ontology = implode(',', $System->get(Features::STANDARD_ONTOLOGY))) {
				$Bullets->addItem("Ontology: " . $ontology);
			} else {
				$Bullets->addItem("Custom ontology");
			}
		}

		$content .= (string)$Bullets;

		$value = (string)$ComponentApi->createDataStore()->setContent($content);
		$Table->set($row, $col, $value);
	}

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addConvertSection($System, $ComponentApi, $Table, $col, $row)
	{
		$header = "Convert";

		if ($name = $System->get(Features::CONVERT_HEADER)) {
			$header .= "\n\"" . $name . "\"";
		}

		$Bullets = $ComponentApi->createBullets();
		foreach ($System->getConversionProcesses() as $process) {
			$Bullets->addItem($process);
		}
		$content = (string)$Bullets;

		$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
		$Table->set($row, $col, $value);
	}

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addKbFormSection($System, $ComponentApi, $Table, $col, $row)
	{
		$name = implode(',', $System->get(Features::KNOWLEDGE_BASE_LANGUAGES));

		$content = "Knowledge source form" . ($name ? "\n(" . $name . ")" : "");

		$Bullets = $ComponentApi->createBullets();
		foreach ($System->getKnowledgeBaseOptions() as $process) {
			$Bullets->addItem($process);
		}
		$content .= (string)$Bullets;

		$value = (string)$ComponentApi->createDataStore()->setContent($content);
		$Table->set($row, $col, $value);
	}

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addExecuteSection($ComponentApi, $System, $Table, $col, $row)
	{
		$header = "Execute";

		$content = '';
		$List = $ComponentApi->createDefinitionList();

		if ($name = $System->get(Features::EXECUTE_HEADER)) {
			$List->addItem('Knowledge Base', $name);
			$content = (string)$List;
		}

		$Bullets = $ComponentApi->createBullets();
		foreach ($System->getExecutorProcesses() as $process) {
			$Bullets->addItem($process);
		}
		$content .= (string)$Bullets;

		$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
		$Table->set($row, $col, $value);
	}

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addAnswerFormSection($ComponentApi, $Table, $col, $row)
	{
		$value = (string)$ComponentApi->createDataStore()->setContent("Knowledge base answers");
		$Table->set($row, $col, $value);
	}

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addAnswerSection($System, $ComponentApi, $Table, $col, $row)
	{
		$header = "Answer";

		if ($name = $System->get(Features::GENERATE_HEADER)) {
			$header .= "\n\"" . $name . "\"";
		}

		$Bullets = $ComponentApi->createBullets();
		foreach ($System->getGenerationOptions() as $process) {
			$Bullets->addItem($process);
		}

		$content = (string)$Bullets;

		$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
		$Table->set($row, $col, $value);
	}

	/**
	 * @param NliSystem $System
	 * @param ComponentApi $ComponentApi
	 * @param Table $Table
	 * @param int $col
	 * @param int $row
	 */
	private function addInterpretSection($System, $ComponentApi, $Table, $col, $row)
	{
		$header = "Interpret";

		if ($name = $System->get(Features::INTERPRET_HEADER)) {
			$header .= "\n\"" . $name . "\"";
		}

		$Bullets = $ComponentApi->createBullets();
		foreach ($System->getInterpretationProcesses() as $process) {
			$Bullets->addItem($process);
		}
		$content = (string)$Bullets;

		$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
		$Table->set($row, $col, $value);
	}
}
