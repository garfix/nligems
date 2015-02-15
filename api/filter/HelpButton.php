<?php

namespace nligems\api\filter;

use nligems\api\component\HtmlElement;

/**
 * @author Patrick van Bergen
 */
class HelpButton extends HtmlElement
{
	private $explanationHtml;

	public function __construct($explanationHtml)
	{
		$this->explanationHtml = $explanationHtml;
	}

	public function __toString()
	{
		return "<div class='help'>?</div><div class='help-popup'>" . $this->explanationHtml . '</div>';
	}
}
