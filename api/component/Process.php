<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Process extends GaneAndSarsonComponent
{
	public function __toString()
	{
		$contentHtml = $this->content ? "<div class='gsProcessContent'>" . nl2br($this->content) . "</div>" : "";

		return "
			<div class='gsProcessOutside'>
				<div class='gsProcessHeader'>" . nl2br(htmlspecialchars($this->header)) . "</div>
				$contentHtml
			</div>";
	}
}
