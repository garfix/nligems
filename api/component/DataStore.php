<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class DataStore extends GaneAndSarsonComponent
{
	public function __toString()
	{
		return "<div class='gsDataStoreOutside'><div class='gsDataStoreInside'>" . nl2br($this->content) . "</div></div>";
	}
}
