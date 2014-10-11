<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class ExternalEntity extends GaneAndSarsonComponent
{
	public function __toString()
	{
		return "<div class='gsExternalBelow'><div class='gsExternalAbove'>" . $this->content . "</div></div>";
	}
}
