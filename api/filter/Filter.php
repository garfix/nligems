<?php

namespace nligems\api\filter;

use nligems\api\component\HtmlElement;
use nligems\api\NliSystem;

/**
 * @author Patrick van Bergen
 */
class Filter
{
	/** @var  SectionGroup[] */
	private $sectionGroups;

	/**
	 * @param SectionGroup $SectionGroup
	 * @return $this
	 */
	public function addSectionGroup(SectionGroup $SectionGroup)
	{
		$this->sectionGroups[] = $SectionGroup;
		return $this;
	}

	/**
	 * Sets the values of all input elements.
	 *
	 * @param array $values
	 */
	public function setValues(array $values)
	{
		foreach ($this->sectionGroups as $SectionGroup) {
			$SectionGroup->setValues($values);
		}
	}

	/**
	 * @param NliSystem $System
	 * @return bool
	 */
	public function matches(NliSystem $System)
	{
		$match = true;

		foreach ($this->sectionGroups as $SectionGroup) {
			$match = $match && $SectionGroup->matches($System);
		}

		return $match;
	}

	public function storeMatches(NliSystem $System)
	{
		foreach ($this->sectionGroups as $SectionGroup) {
			$SectionGroup->storeMatches($System);
		}
	}

	/**
	 * @return array
	 */
	public function getFeatures()
	{
		$features = array();

		foreach ($this->sectionGroups as $SectionGroup) {
			$features = array_merge($features, $SectionGroup->getFeatures());
		}

		return $features;
	}

	public function __toString()
	{
		$Form = new HtmlElement('form');

		foreach ($this->sectionGroups as $SectionGroup) {
			$Form->addChildHtml((string)$SectionGroup);
		}

		$Submit = new HtmlElement('input', false);
		$Submit->addAttribute('type', 'submit');
		$Submit->addAttribute('name', 'fire');
		$Submit->addAttribute('value', 'Apply');
		$Submit->addClass('hidden');

		$Form->addChildNode($Submit);

		return (string)$Form;
	}
}
