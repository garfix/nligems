<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class DefinitionList
{
	private $items = array();

	public function addItem($name, $description)
	{
		$this->items[$name] = $description;
	}

	public function __toString()
	{
		$html = "<dl>";

		foreach ($this->items as $name => $description) {
			$html .= "<dt>" . $name . "</dt>";
			$html .= "<dd>" . $description . "</dd>";
		}

		$html .= "</dl>";

		return $html;
	}
}
