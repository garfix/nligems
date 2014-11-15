<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\filter\Checkbox;
use nligems\api\filter\CheckboxGroup;
use nligems\api\filter\CheckboxHeader;
use nligems\api\filter\Filter;
use nligems\api\filter\Section;
use nligems\api\NliSystem;
use nligems\api\NliSystemApi;
use nligems\api\component\Header;
use nligems\api\component\ResultSet;
use nligems\api\page\Page;

/**
 * @author Patrick van Bergen
 */
class FilterPage extends Page
{
	/** @var  Filter */
	private $Filter;

	/** @var  ResultSet */
	private $ResultSet;

	public function __construct(NliSystemApi $NliSystemApi)
	{
		$this->Header = new Header('Filter by property', 'index');

		$this->Filter = $this->getFilter($NliSystemApi);
		$this->Filter->setValues($_REQUEST);

		$this->ResultSet = new ResultSet();
		$filteredSystems = $this->ResultSet->filterResults($NliSystemApi, $this->Filter, $_REQUEST);

		foreach ($filteredSystems as $System) {
			$this->Filter->storeMatches($System);
		}

		$this->addStyleSheet('common');
		$this->addStyleSheet('filter');

		$this->addScript('filter');
	}

	public function getBody()
	{
		$Page = new HtmlElement('div');
		$Page->addClass('page');

		$Header = new HtmlElement('div');
		$Header->addClass('header');
		$Header->addChildHtml((string)$this->Header);
		$Page->addChildNode($Header);

		$FilterContainer = new HtmlElement('div');
		$FilterContainer->addAttribute('class', 'filterbar');
		$FilterContainer->addChildHtml((string)$this->Filter);
		$Page->addChildNode($FilterContainer);

		$ResultContainer = new HtmlElement('div');
		$ResultContainer->addAttribute('class', 'resultset');
		$ResultContainer->addChildHtml((string)$this->ResultSet);
		$Page->addChildNode($ResultContainer);

		return (string)$Page;
	}

	public function getFilter(NliSystemApi $NliSystemApi)
	{
		$Filter = new Filter();

		$Filter->addSection($Section = new Section('Code', Section::TYPE_GENERAL));

			$this->addCheckboxGroup($NliSystemApi, $Section, NliSystem::PROGRAMMING_LANGUAGES);

		$Filter->addSection($Section = new Section('System structure', Section::TYPE_GENERAL));

			$this->addCheckboxHeader($Section, 'Main features');
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::DIALOG);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::NEW_WORDS);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::MULTI_DB);

			$this->addCheckboxGroup($NliSystemApi, $Section, NliSystem::ANALYSIS);

		$Filter->addSection($Section = new Section('Language constructs', Section::TYPE_GENERAL));

			$this->addCheckboxHeader($Section, 'Phrase types');
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::NP);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::VP);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::PP);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::DP);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::ADVP);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::ADJP);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::RC);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::NEG);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::CONJ);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::ANAPHORA);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::AUX);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::MODALS);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::COMPARATIVE_EXPRESSIONS);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::PASSIVES);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::CLEFTS);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::THERE_BES);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::ELLIPSIS);

			$this->addCheckboxGroup($NliSystemApi, $Section, NliSystem::SENTENCE_TYPES);

		$Filter->addSection($Section = new Section('Tokenization', Section::TYPE_PROCESS));

			$this->addCheckboxHeader($Section, 'Tokenization features');
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::DICTIONARY_LOOKUP);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::MORPHOLOGICAL_ANALYSIS);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::WORD_SEPARATION);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::SPELLING_CORRECTION);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::OPEN_ENDED_TOKEN_RECOGNITION);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::PROPER_NAMES_FROM_KB);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::PROPER_NAMES_BY_MATCHING);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::QUOTED_STRING_RECOGNITION);

		$Filter->addSection($Section = new Section('Parsing', Section::TYPE_PROCESS));

			$this->addCheckboxGroup($NliSystemApi, $Section, NliSystem::GRAMMAR_TYPE);
			$this->addCheckboxGroup($NliSystemApi, $Section, NliSystem::PARSER_TYPE);

		$Filter->addSection($Section = new Section('Interpretation', Section::TYPE_PROCESS));

			$this->addCheckboxHeader($Section, 'Interpretation features');
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::SEMANTIC_ATTACHMENT);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::MODIFIER_ATTACHMENT);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::CONJUNCTION_DISJUNCTION);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::NOMINAL_COMPOUNDS);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::SEMANTIC_COMPOSITION);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::SEMANTIC_CONFLICT_DETECTION);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::QUANTIFIER_SCOPING);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::ANAPHORA_RESOLUTION);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::PLAUSIBILITY_RESOLUTION);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::UNIFORMIZATION_REWRITES);

		$Filter->addSection($Section = new Section('Conversion to knowledge base form', Section::TYPE_PROCESS));

			$this->addCheckboxHeader($Section, 'Conversion features');
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::SYNTACTIC_REWRITE);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::OPTIMIZE_QUERY);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::RESTRUCTURE_INFORMATION);

		$Filter->addSection($Section = new Section('Knowledge base execution', Section::TYPE_PROCESS));

			$this->addCheckboxHeader($Section, 'Execution features');
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::LOGICAL_REASONING);

		$Filter->addSection($Section = new Section('Semantic form', Section::TYPE_DATA));

			$this->addCheckboxGroup($NliSystemApi, $Section, NliSystem::SEMANTIC_FORM_TYPE);
			$this->addCheckboxHeader($Section, 'Semantic features');
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::EVENT_BASED);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::PROPER_NOUN_CONSTANTS);
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::ONTOLOGY_USED);
			$this->addCheckboxGroup($NliSystemApi, $Section, NliSystem::STANDARD_ONTOLOGY);

		$Filter->addSection($Section = new Section('Knowledge base form', Section::TYPE_DATA));

			$this->addCheckboxGroup($NliSystemApi, $Section, NliSystem::KNOWLEDGE_BASE_TYPE);
			$this->addCheckboxGroup($NliSystemApi, $Section, NliSystem::KNOWLEDGE_BASE_LANGUAGES);
			$this->addCheckboxHeader($Section, 'Knowledge base features');
			$this->addCheckbox($NliSystemApi, $Section, NliSystem::KNOWLEDGE_BASE_AGGREGATION);

		return $Filter;
	}

	private function addCheckboxHeader(Section $Section, $header)
	{
		$Section->addComponent(new CheckboxHeader($header));
	}

	private function addCheckbox(NliSystemApi $NliSystemApi, Section $Section, $feature)
	{
		$Section->addComponent(new Checkbox($feature, $NliSystemApi->getFeatureName($feature)));
	}

	private function addCheckboxGroup(NliSystemApi $NliSystemApi, Section $Section, $feature)
	{
		$Section->addComponent($Component = new CheckboxGroup($feature, $NliSystemApi->getFeatureName($feature)));
		foreach ($NliSystemApi->getAllFeatureValues($feature) as $value) {
			$Component->addOption($value, $value);
		}
	}

}
