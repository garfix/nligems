<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\Features;
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

				$this->addCheckboxGroup($NliSystemApi, $Section, Features::PROGRAMMING_LANGUAGES);

			$Group->addSection($Section = new Section('System structure', Section::TYPE_GENERAL));

				$this->addCheckboxGroup($NliSystemApi, $Section, Features::ANALYSIS);

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Specification', Features::TAG_STRUCTURE);

		$Filter->addSectionGroup($Group = new SectionGroup('Processes'));

			$Group->addSection($Section = new Section('Tokenization', Section::TYPE_PROCESS));

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Features', Features::TAG_TOKENIZATION);

			$Group->addSection($Section = new Section('Parsing', Section::TYPE_PROCESS));

				$this->addCheckboxGroup($NliSystemApi, $Section, Features::PARSER_TYPE);

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Features', Features::TAG_PARSING);

			$Group->addSection($Section = new Section('Semantic Analysis', Section::TYPE_PROCESS));

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Features', Features::TAG_SEMANTIC_ANALYSIS);

				$this->addCheckbox($NliSystemApi, $Section, Features::UNIFORMIZATION_REWRITES);
				$this->addCheckbox($NliSystemApi, $Section, Features::COOPERATIVE_RESPONSES);

			$Group->addSection($Section = new Section('Conversion to knowledge base form', Section::TYPE_PROCESS));

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Features', Features::TAG_CONVERSION_TO_KB);

			$Group->addSection($Section = new Section('Knowledge base execution', Section::TYPE_PROCESS));

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Features', Features::TAG_EXECUTION);

			$Group->addSection($Section = new Section('Answer generation', Section::TYPE_PROCESS));

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Features', Features::TAG_ANSWER);

			$Group->addSection($Section = new Section('User Dialog', Section::TYPE_PROCESS));

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Features', Features::TAG_DIALOG);

		$Filter->addSectionGroup($Group = new SectionGroup('Process Data Structures'));

			$Group->addSection($Section = new Section('Semantic form', Section::TYPE_DATA));

				$this->addCheckboxGroup($NliSystemApi, $Section, Features::SEMANTIC_FORM_TYPE);

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Semantic features', Features::TAG_SEMANTIC_FORM);

				$this->addCheckboxGroup($NliSystemApi, $Section, Features::STANDARD_ONTOLOGY);

			$Group->addSection($Section = new Section('Knowledge base form', Section::TYPE_DATA));

				$this->addCheckboxGroup($NliSystemApi, $Section, Features::KNOWLEDGE_BASE_LANGUAGES);

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Knowledge base features', Features::TAG_KB_FORM);

		$Filter->addSectionGroup($Group = new SectionGroup('Models'));

			$Group->addSection($Section = new Section('Domain model', Section::TYPE_DATA));

				$this->addCheckboxGroup($NliSystemApi, $Section, Features::KNOWLEDGE_BASE_TYPE);

			$Group->addSection($Section = new Section('Lexicon', Section::TYPE_DATA));

			$Group->addSection($Section = new Section('Grammar', Section::TYPE_DATA));

				$this->addCheckboxGroup($NliSystemApi, $Section, Features::GRAMMAR_TYPE);
				$this->addCheckboxGroup($NliSystemApi, $Section, Features::SENTENCE_TYPES);

				$this->addCheckboxGroupForTag($NliSystemApi, $Section, 'Phrase types', Features::TAG_PHRASE_TYPE);

			$Group->addSection($Section = new Section('Dialog model', Section::TYPE_DATA));

		return $Filter;
	}

	private function addCheckboxGroupForTag(NliSystemApi $NliSystemApi, Section $Section, $header, $tag)
	{
		$Section->addComponent(new CheckboxHeader($header));

		foreach ($NliSystemApi->getFeaturesByTag($tag) as $feature) {
			$this->addCheckbox($NliSystemApi, $Section, $feature);
		}
	}

	private function addCheckbox(NliSystemApi $NliSystemApi, Section $Section, $feature)
	{
		$Component = new Checkbox($feature, $NliSystemApi->getFeatureName($feature));

		if ($explanationHtml = $NliSystemApi->getExplanationHtml($feature)) {
			$featureName = $NliSystemApi->getFeatureName($feature);
			$Component->setHelpButton(new HelpButton($featureName, $explanationHtml));
		}

		$Section->addComponent($Component);
	}

	private function addCheckboxGroup(NliSystemApi $NliSystemApi, Section $Section, $feature)
	{
		$Section->addComponent($Component = new CheckboxGroup($feature, $NliSystemApi->getFeatureName($feature)));

		if ($explanationHtml = $NliSystemApi->getExplanationHtml($feature)) {
			$featureName = $NliSystemApi->getFeatureName($feature);
			$Component->setHelpButton(new HelpButton($featureName, $explanationHtml));
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
