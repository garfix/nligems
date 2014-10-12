<?php

namespace nligems\api;

use nligems\page\FilterPage;
use nligems\page\IndexPage;
use nligems\page\SystemPage;

/**
 * @author Patrick van Bergen
 */
class PageApi
{
	/**
	 * @return IndexPage
	 */
	public function getIndexPage()
	{
		return new IndexPage();
	}

	/**
	 * @param NliSystemApi $NliSystemApi
	 * @return FilterPage
	 */
	public function getFilterPage(NliSystemApi $NliSystemApi)
	{
		return new FilterPage($NliSystemApi);
	}

	/**
	 * @param NliSystem $NliSystem
	 * @return SystemPage
	 */
	public function getSystemPage(NliSystem $NliSystem)
	{
		return new SystemPage($NliSystem);
	}
}
