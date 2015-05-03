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
	private $options = array();

	/** @var array  */
	protected $value = array();

	/** @var NliSystem[][] */
	private $runningSystemsPerOption = array();

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

		$H4 = new HtmlElement('H4');
		$H4->addChildText($this->description);

		if ($this->HelpButton) {
			$H4->addChildHtml(' ' . $this->HelpButton);
		}

		$Container->addChildNode($H4);

		foreach ($this->options as $id => $description) {

			$OptionContainer = new HtmlElement('div');

			$Element = new HtmlElement('input', false);
			$Element->addAttribute('type', 'checkbox');
			$Element->addAttribute('name', $this->id . '[]');
			$Element->addAttribute('value', $id);

			$OptionContainer->addChildNode($Element);

			if (in_array($id, $this->value)) {

				$Element->addAttribute('checked', 1);
				$OptionContainer->addChildText($description);

			} else {

				$count = 0;

				if (isset($this->runningSystemsPerOption[$id])) {
					$count = count($this->runningSystemsPerOption[$id]);
				}

				$description .= ' ( ' . $count . ' )';

				if ($count == 0) {

					$Span = new HtmlElement('span');
					$Span->addClass('greyedOut');
					$Element->addAttribute('disabled', 1);

					$Span->addChildText($description);
					$OptionContainer->addChildNode($Span);

				} else {

					$OptionContainer->addChildText($description);

				}
			}

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
			return count(array_intersect($System->get($this->id), $this->value)) == count($this->value);
		} else {
			return true;
		}
	}

	public function storeMatches(NliSystem $System)
	{
		// find the values that are not in use yet
		$diff = array_diff(array_keys($this->options), $this->value);

		// and are available in the system
		$intersection = array_intersect($System->get($this->id), $diff);

		foreach ($intersection as $option) {
			$this->runningSystemsPerOption[$option][] = $System;
		}
	}

	public function hasMatches()
	{
		return !empty($this->runningSystemsPerOption);
	}
}
