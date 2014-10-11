<?php

namespace nligems\api\filter;

use nligems\api\component\HtmlElement;
use nligems\api\NliSystem;

/**
 * @author Patrick van Bergen
 */
class CheckboxGroup extends Component
{
	/** @var array  */
	private $options = [];

	/** @var array  */
	protected $value = [];

	/**
	 * @param $id
	 * @param $description
	 */
	public function addOption($id, $description)
	{
		$this->options[$id] = $description;
	}

	public function __toString()
	{
		$Container = new HtmlElement('div');

		$H3 = new HtmlElement('H3');
		$H3->addChildText($this->description);

		$Container->addChildNode($H3);

		foreach ($this->options as $id => $description) {

			$OptionContainer = new HtmlElement('div');

			$Element = new HtmlElement('input', false);
			$Element->addAttribute('type', 'checkbox');
			$Element->addAttribute('name', $this->id . '[]');
			$Element->addAttribute('value', $id);

			if (in_array($id, $this->value)) {
				$Element->addAttribute('checked', 1);
			}

			$OptionContainer->addChildNode($Element);
			$OptionContainer->addChildText($description);

			$Container->addChildNode($OptionContainer);
		}

		return (string)$Container;
	}

	/**
	 * @param NliSystem $System
	 * @return bool
	 */
	public function matches(NliSystem $System)
	{
		if ($this->value) {
			return count(array_intersect($System->get($this->id), $this->value)) > 0;
		} else {
			return true;
		}
	}
}
