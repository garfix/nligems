<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Bullets
{
	private $items = array();

	/** @var string[] */
	private $classes = array();

	public function addItem($item)
	{
		$this->items[] = $item;
	}

	public function addClass($class)
	{
		$this->classes[] = $class;
	}

	public function __toString()
	{
		$class = implode(' ', $this->classes);
		$html = "<ul class='$class'>";

		foreach ($this->items as $item) {
			$html .= "<li>" . $item . "</li>";
		}

		$html .= "</ul>";

		return $html;
	}
}
