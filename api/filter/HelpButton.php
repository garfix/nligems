<?php

namespace nligems\api\filter;

use nligems\api\component\HtmlElement;

/**
 * @author Patrick van Bergen
 */
class HelpButton extends HtmlElement
{
	private $explanationHtml;

	public function __construct($featureName, $explanationHtml)
	{
		$this->featureName = $featureName;
		$this->explanationHtml = $explanationHtml;
	}

	public function __toString()
	{
		return "
			<input class='help' type='button' value='?' />
			<div class='help-popup'>
				<header>" . htmlspecialchars($this->featureName) . "</header>" .
				$this->explanationHtml . '
			</div>';
	}
}
