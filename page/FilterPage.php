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
use nligems\api\TagTree;

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

		foreach (TagTree::getTagTree() as $sectionGroupData) {
			$Filter->addSectionGroup($Group = new SectionGroup($sectionGroupData['name']));

			foreach ($sectionGroupData['sections'] as $sectionData) {

				$Section = new Section($name = $sectionData['name'], Section::TYPE_GENERAL);

				$complexFeatures = [];
				$simpleFeatures = [];

				foreach ($NliSystemApi->getFeaturesByTag($sectionData['tag']) as $feature) {
					$type = $NliSystemApi->getFeatureType($feature);
					if ($type == Features::FEATURETYPE_BOOL) {
						$simpleFeatures[] = $feature;
					} elseif ($type == Features::FEATURETYPE_MULTIPLE_CHOICE) {
						$complexFeatures[] = $feature;
					}
				}

				if (!empty($complexFeatures)) {
					foreach ($complexFeatures as $feature) {
						$this->addCheckboxGroup($NliSystemApi, $Section, $feature);
					}
				}
				if (!empty($simpleFeatures)) {
					$Section->addComponent(new CheckboxHeader('Features'));
					foreach ($simpleFeatures as $feature) {
						$this->addCheckbox($NliSystemApi, $Section, $feature);
					}
				}

				if ($Section->hasComponents()) {
					$Group->addSection($Section);
				}
			}
		}

		return $Filter;
	}

	private function addCheckbox(NliSystemApi $NliSystemApi, Section $Section, $feature)
	{
		$Component = new Checkbox($feature, $NliSystemApi->getFeatureName($feature));

		$explanationHtml = $NliSystemApi->getExplanationHtml($feature);
		if (trim($explanationHtml)) {
			$featureName = $NliSystemApi->getFeatureName($feature);
			$Component->setHelpButton(new HelpButton($featureName, $explanationHtml));
		}

		$Section->addComponent($Component);
	}

	private function addCheckboxGroup(NliSystemApi $NliSystemApi, Section $Section, $feature)
	{
		$Section->addComponent($Component = new CheckboxGroup($feature, $NliSystemApi->getFeatureName($feature)));

		$explanationHtml = $NliSystemApi->getExplanationHtml($feature);
		if (trim($explanationHtml)) {
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
