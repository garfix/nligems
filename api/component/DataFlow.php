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

        	$header = "Tokenize";

        	$Bullets = $ComponentApi->createBullets();
        	foreach ($System->getTokenizationProcesses() as $process) {
        		$Bullets->addItem($process);
        	}
        	$content = (string)$Bullets;
        	$value = (string)$ComponentApi->createProcess()->setHeader($header)->setContent($content);
        	$Table->set(1, $col, $value);

        	$value = (string)$ComponentApi->createDataStore()->setContent("Tokens");
        	$Table->set(2, $col, $value);

	        if (in_array('parse and interpret', $System->get(Features::ANALYSIS))) {

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
		        $Table->set(3, $col, $value);

		        $value = (string)$ComponentApi->createDataStore()->setContent("Syntactic form");
		        $Table->set(4, $col, $value);
	        }

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
        	$Table->set(5, $col, $value);

        	if ($System->get(Features::SYNTACTIC_REWRITE)) {

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
        		$Table->set(6, $col, $value);

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
        		$Table->set(7, $col, $value);

        	}

        	$name = implode(',', $System->get(Features::KNOWLEDGE_BASE_LANGUAGES));

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
        	$Table->set(9, $col, $value);


        	$value = (string)$ComponentApi->createDataStore()->setContent("Knowledge base answers");
        	$Table->set(10, $col, $value);

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
        	$Table->set(11, $col, $value);

        	$value = (string)$ComponentApi->createExternalEntity()->setContent("Natural Language output");
        	$Table->set(12, $col, $value);

        	$col++;
        }

        return (string)$Table;
    }
}
