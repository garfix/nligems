<?php

namespace nligems\api;

use nligems\page\FilterPage;
use nligems\page\IndexPage;
use nligems\page\SystemPage;
use nligems\page\TimeLinePage;

/**
 * @author Patrick van Bergen
 */
class PageApi
{
	public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}

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
	 * @param NliSystemApi $NliSystemApi
	 * @return TimeLinePage
	 */
	public function getTimeLinePage(NliSystemApi $NliSystemApi)
	{
		return new TimeLinePage($NliSystemApi);
	}
	/**
	 * @param NliSystem $NliSystem
	 * @return SystemPage
	 */
	public function getSystemPage(NliSystem $NliSystem)
	{
		return new SystemPage($NliSystem);
	}

	public function setSecondaryPage($page)
	{
		$_SESSION['secondaryPage'] = $page;
	}

	public function getSecondaryPage()
	{
		if (empty($_SESSION['secondaryPage'])) {
			return 'index';
		} else {
			return $_SESSION['secondaryPage'];
		}
	}
}
