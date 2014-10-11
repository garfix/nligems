<?php

namespace nligems\api;

use nligems\page\FilterPage;
use nligems\page\IndexPage;

/**
 * @author Patrick van Bergen
 */
class PageApi
{
	public function getIndexPage()
	{
		return new IndexPage();
	}

	public function getFilterPage(NliSystemApi $NliSystemApi)
	{
		return new FilterPage($NliSystemApi);
	}
}
