<?php

namespace nligems\api\filter;

use nligems\api\component\HtmlElement;
use nligems\api\NliSystem;

/**
 * @author Patrick van Bergen
 */
class SectionGroup
{
	private $name;

	/** @var Section[] */
	private $sections = [];

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function addSection(Section $Section)
	{
		$this->sections[] = $Section;
	}

	/**
	 * Sets the values of all input elements.
	 *
	 * @param array $values
	 */
	public function setValues(array $values)
	{
		foreach ($this->sections as $Section) {
			$Section->setValues($values);
		}
	}

	/**
	 * @param NliSystem $System
	 * @return bool
	 */
	public function matches(NliSystem $System)
	{
		$match = true;

		foreach ($this->sections as $Section) {
			$match = $match && $Section->matches($System);
		}

		return $match;
	}

	public function storeMatches(NliSystem $System)
	{
		foreach ($this->sections as $Section) {
			$Section->storeMatches($System);
		}
	}

	/**
	 * @return array
	 */
	public function getFeatures()
	{
		$features = array();

		foreach ($this->sections as $Section) {
			$features = array_merge($features, $Section->getFeatures());
		}

		return $features;
	}

	public function __toString()
	{
		$H2 = new HtmlElement('H2');
		$H2->addClass('filter');
		$H2->addChildText($this->name);

		$Count = new HtmlElement('span');
		$Count->addChildText('');
		$H2->addChildNode($Count);

		$Div = new HtmlElement('Div');
		$Div->addClass('filter');
		foreach ($this->sections as $Section) {
			$Div->addChildHtml((string)$Section);
		}

		return (string)$H2 . (string)$Div;
	}
}
