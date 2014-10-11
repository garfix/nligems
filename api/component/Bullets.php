<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Bullets
{
	private $items = array();

	public function addItem($item)
	{
		$this->items[] = $item;
	}

	public function __toString()
	{
		$html = "<ul>";

		foreach ($this->items as $item) {
			$html .= "<li>" . $item . "</li>";
		}

		$html .= "</ul>";

		return $html;
	}
}
