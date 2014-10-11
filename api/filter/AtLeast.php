<?php

namespace nligems\api\filter;
use nligems\api\component\HtmlElement;
use nligems\api\NliSystem;

/**
 * @author Patrick van Bergen
 */
class AtLeast extends Component
{
	public function __toString()
	{
		$Element = new HtmlElement('input', false);
		$Element->addAttribute('type', 'text');
		$Element->addAttribute('name', $this->id);
		$Element->addAttribute('value', $this->value);

		return $this->description . ': ' . (string)$Element;
	}

	/**
	 * @param NliSystem $System
	 * @return bool
	 */
	public function matches(NliSystem $System)
	{
		if ($this->value) {
			return $System->get($this->id) >= $this->value;
		} else {
			return true;
		}
	}
}
