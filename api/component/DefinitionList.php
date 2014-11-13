<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class DefinitionList
{
	private $items = array();

	/** @var string[] */
	private $classes = array();

	public function addItem($name, $description)
	{
		$this->items[$name] = $description;
	}

	public function addClass($class)
	{
		$this->classes[] = $class;
	}

	public function __toString()
	{
		$class = implode(' ', $this->classes);
		$html = "<dl class='$class'>";

		foreach ($this->items as $name => $description) {
			$html .= "<dt>" . $name . "</dt>";
			$html .= "<dd>" . $description . "</dd>";
		}

		$html .= "</dl>";

		return $html;
	}
}
