<?php

namespace nligems\api\filter;

use nligems\api\component\HtmlElement;
use nligems\api\NliSystem;

/**
 * @author Patrick van Bergen
 */
class Section
{
	const TYPE_GENERAL = 'general';
	const TYPE_PROCESS = 'process';
	const TYPE_DATA = 'data';

	/** @var  string */
	private $name;

	/** @var  string */
	private $type;

	/** @var  Component[] $components */
	private $components = [];

	/**
	 * @param string $name
	 * @param string $type
	 */
	public function __construct($name, $type)
	{
		$this->name = $name;
		$this->type = $type;
	}

	/**
	 * @param Component $Component
	 */
	public function addComponent(Component $Component)
	{
		$this->components[] = $Component;
	}

	/**
	 * Sets the values of all input elements.
	 *
	 * @param array $values
	 */
	public function setValues(array $values)
	{
		foreach ($this->components as $Component) {
			$id = $Component->getId();
			if (isset($values[$id])) {
				$Component->setValue($values[$id]);
			}
		}
	}

	/**
	 * @param NliSystem $System
	 * @return bool
	 */
	public function matches(NliSystem $System)
	{
		$match = true;

		foreach ($this->components as $Component) {
			$match = $match && $Component->matches($System);
		}

		return $match;
	}

	public function __toString()
	{
		$H2 = new HtmlElement('H2');
		$H2->addClass('filter');
		$H2->addClass($this->type);
		$H2->addChildText($this->name);

		$Count = new HtmlElement('span');
		$Count->addChildText('');
		$H2->addChildNode($Count);

		$Div = new HtmlElement('Div');
		$Div->addClass('filter');
		foreach ($this->components as $Component) {
			$Div->addChildHtml((string)$Component);
		}

		return (string)$H2 . (string)$Div;
	}
}
