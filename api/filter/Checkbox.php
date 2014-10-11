<?php

namespace nligems\api\filter;

use nligems\api\component\HtmlElement;
use nligems\api\NliSystem;

/**
 * @author Patrick van Bergen
 */
class Checkbox extends Component
{
	/** @var bool  */
	protected $value = false;

	public function __toString()
	{
		$Container = new HtmlElement('div');

		$Element = new HtmlElement('input', false);
		$Element->addAttribute('type', 'checkbox');
		$Element->addAttribute('name', $this->id);

		if ($this->value) {
			$Element->addAttribute('checked', 1);
		}

		$Container->addChildNode($Element);
		$Container->addChildText($this->description);

		return  (string)$Container;
	}

	/**
	 * @param NliSystem $System
	 * @return bool
	 */
	public function matches(NliSystem $System)
	{
		if ($this->value) {
			return $System->get($this->id) == $this->value;
		} else {
			return true;
		}
	}
}
