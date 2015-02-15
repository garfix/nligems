<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\filter\Checkbox;
use nligems\api\filter\CheckboxGroup;
use nligems\api\filter\CheckboxHeader;
use nligems\api\filter\Filter;
use nligems\api\filter\HelpButton;
use nligems\api\filter\Section;
use nligems\api\filter\SectionGroup;
use nligems\api\LinkApi;
use nligems\api\NliSystemApi;
use nligems\api\component\Header;
use nligems\api\component\ResultSet;
use nligems\api\page\FrontEndPage;

/**
 * @author Patrick van Bergen
 */
class FilterPage extends FrontEndPage
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
		$LinkApi = new LinkApi();

		$Page = new HtmlElement('div');
		$Page->addClass('page');

		$Header = new HtmlElement('div');
		$Header->addClass('header');
		$Header->addChildHtml((string)$this->Header);
		$Page->addChildNode($Header);

		$FilterContainer = new HtmlElement('div');
		$FilterContainer->addAttribute('class', 'filterbar');

		$Form = new HtmlElement('form');
		$Form->addAttribute('action', $LinkApi->getLink('filter'));
		$Form->addAttribute('method', 'get');

		$Submit = new HtmlElement('button');
		$Submit->addAttribute('type', 'submit');
		$Submit->addChildHtml('Clear');
		$Submit->addClass('clear');
		$Form->addChildNode($Submit);

		$FilterContainer->addChildNode($Form);

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

		$Filter->addSectionGroup($Group = new SectionGroup('General'));

			$Group->addSection($Section = new Section('Code', Section::TYPE_GENERAL));

				$this->addCheckboxGroup($NliSystemApi, $Section, NliSystemApi::PROGRAMMING_LANGUAGES);

			$Group->addSection($Section = new Section('System structure', Section::TYPE_GENERAL));

				$this->addCheckboxGroup($NliSystemApi, $Section, NliSystemApi::ANALYSIS);

				$this->addCheckboxHeader($Section, 'Specification');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::SEMANTIC_GRAMMAR);

		$Filter->addSectionGroup($Group = new SectionGroup('Processes'));

			$Group->addSection($Section = new Section('Tokenization', Section::TYPE_PROCESS));

				$this->addCheckboxHeader($Section, 'Tokenization features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::DICTIONARY_LOOKUP);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::MORPHOLOGICAL_ANALYSIS);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::WORD_SEPARATION);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::SPELLING_CORRECTION);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::OPEN_ENDED_TOKEN_RECOGNITION);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::PROPER_NAMES_FROM_KB);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::PROPER_NAMES_BY_MATCHING);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::QUOTED_STRING_RECOGNITION);

			$Group->addSection($Section = new Section('Parsing', Section::TYPE_PROCESS));

				$this->addCheckboxGroup($NliSystemApi, $Section, NliSystemApi::PARSER_TYPE);

				$this->addCheckboxHeader($Section, 'Features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::ACCEPT_UNGRAMMATICAL_SENTENCES);

			$Group->addSection($Section = new Section('Semantic Analysis', Section::TYPE_PROCESS));

				$this->addCheckboxHeader($Section, 'Features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::SEMANTIC_ATTACHMENT);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::MODIFIER_ATTACHMENT);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::CONJUNCTION_DISJUNCTION);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::NOMINAL_COMPOUNDS);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::SEMANTIC_COMPOSITION);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::SEMANTIC_CONFLICT_DETECTION);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::QUANTIFIER_SCOPING);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::ANAPHORA_RESOLUTION);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::PLAUSIBILITY_RESOLUTION);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::UNIFORMIZATION_REWRITES);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::COOPERATIVE_RESPONSES);

			$Group->addSection($Section = new Section('Conversion to knowledge base form', Section::TYPE_PROCESS));

				$this->addCheckboxHeader($Section, 'Conversion features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::SYNTACTIC_REWRITE);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::OPTIMIZE_QUERY);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::RESTRUCTURE_INFORMATION);

			$Group->addSection($Section = new Section('Knowledge base execution', Section::TYPE_PROCESS));

				$this->addCheckboxHeader($Section, 'Execution features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::LOGICAL_REASONING);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::MULTI_DB);

			$Group->addSection($Section = new Section('Answer generation', Section::TYPE_PROCESS));

				$this->addCheckboxHeader($Section, 'Features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::PARAPHRASE_QUERY);

			$Group->addSection($Section = new Section('User Dialog', Section::TYPE_PROCESS));

				$this->addCheckboxHeader($Section, 'Features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::DIALOG);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::NEW_WORDS);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::META_SELF);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::META_KB);

		$Filter->addSectionGroup($Group = new SectionGroup('Process Data Structures'));

			$Group->addSection($Section = new Section('Semantic form', Section::TYPE_DATA));

				$this->addCheckboxGroup($NliSystemApi, $Section, NliSystemApi::SEMANTIC_FORM_TYPE);
				$this->addCheckboxHeader($Section, 'Semantic features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::EVENT_BASED);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::TEMPORAL);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::PROPER_NOUN_CONSTANTS);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::ONTOLOGY_USED);
				$this->addCheckboxGroup($NliSystemApi, $Section, NliSystemApi::STANDARD_ONTOLOGY);

			$Group->addSection($Section = new Section('Knowledge base form', Section::TYPE_DATA));

				$this->addCheckboxGroup($NliSystemApi, $Section, NliSystemApi::KNOWLEDGE_BASE_LANGUAGES);
				$this->addCheckboxHeader($Section, 'Knowledge base features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::KNOWLEDGE_BASE_AGGREGATION);

		$Filter->addSectionGroup($Group = new SectionGroup('Models'));

			$Group->addSection($Section = new Section('Domain model', Section::TYPE_DATA));

				$this->addCheckboxGroup($NliSystemApi, $Section, NliSystemApi::KNOWLEDGE_BASE_TYPE);

			$Group->addSection($Section = new Section('Lexicon', Section::TYPE_DATA));

				$this->addCheckboxHeader($Section, 'Features');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::LEXICON_DERIVE_WORDS);

			$Group->addSection($Section = new Section('Grammar', Section::TYPE_DATA));

				$this->addCheckboxGroup($NliSystemApi, $Section, NliSystemApi::GRAMMAR_TYPE);
				$this->addCheckboxGroup($NliSystemApi, $Section, NliSystemApi::SENTENCE_TYPES);

				$this->addCheckboxHeader($Section, 'Phrase types');
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::NP);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::VP);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::PP);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::DP);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::ADVP);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::ADJP);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::RC);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::NEG);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::CONJ);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::ANAPHORA);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::AUX);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::MODALS);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::COMPARATIVE_EXPRESSIONS);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::PASSIVES);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::CLEFTS);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::THERE_BES);
				$this->addCheckbox($NliSystemApi, $Section, NliSystemApi::ELLIPSIS);

			$Group->addSection($Section = new Section('Dialog model', Section::TYPE_DATA));

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

		if ($explanationHtml = $NliSystemApi->getExplanationHtml($feature)) {
			$Component->setHelpButton(new HelpButton($explanationHtml));
		}

		if ($possibleValues = $NliSystemApi->getPossibleValues($feature)) {

			foreach ($possibleValues as $key => $value) {
				$Component->addOption($key, $value);
			}

		} else {
			$possibleValues = $NliSystemApi->getAllFeatureValues($feature);

			foreach ($possibleValues as $value) {
				$Component->addOption($value, $value);
			}
		}
	}

}
