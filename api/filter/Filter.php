<?php

namespace nligems\api\filter;

use nligems\api\component\HtmlElement;
use nligems\api\NliSystem;

/**
 * @author Patrick van Bergen
 */
class Filter
{
	/** @var  Section[] */
	private $sections;

	/**
	 * @param Section $Section
	 * @return $this
	 */
	public function addSection(Section $Section)
	{
		$this->sections[] = $Section;
		return $this;
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

	public function __toString()
	{
		$Form = new HtmlElement('form');

		foreach ($this->sections as $Section) {
			$Form->addChildHtml((string)$Section);
		}

		$Submit = new HtmlElement('input');
		$Submit->addAttribute('type', 'submit');
		$Submit->addAttribute('name', 'fire');
		$Submit->addAttribute('value', 'Apply');
		$Submit->addClass('hidden');

		$Form->addChildNode($Submit);

		return (string)$Form;
	}
}
