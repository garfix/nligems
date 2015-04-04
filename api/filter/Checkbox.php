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

	/**
	 * @var NliSystem[]
	 */
	private $runningSystems = array();

	public function __toString()
	{
		$Container = new HtmlElement('div');

		$Element = new HtmlElement('input', false);
		$Element->addAttribute('type', 'checkbox');
		$Element->addAttribute('name', $this->id);

		$Container->addChildNode($Element);

		$description = $this->description;

		if ($this->value) {

			$Element->addAttribute('checked', 1);
			$Container->addChildText($description);

		} else {

			$count = 0;

			if (isset($this->runningSystems)) {
				$count = count($this->runningSystems);
			}

			$description .= ' ( ' . $count . ' )';

			if ($count == 0) {

				$Span = new HtmlElement('span');
				$Span->addClass('greyedOut');
				$Element->addAttribute('disabled', 1);

				$Span->addChildText($description);
				$Container->addChildNode($Span);

			} else {

				$Container->addChildText($description);

			}
		}

		if ($this->HelpButton) {
			$Container->addChildHtml(' ' . $this->HelpButton);
		}


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

	public function storeMatches(NliSystem $System)
	{
		// if this checkbox is not checked, and the system's value is set, keep the system in the running
		if (!$this->value && $System->get($this->id)) {
			$this->runningSystems[] = $System;
		}
	}

	public function hasMatches()
	{
		return !empty($this->runningSystems);
	}
}
