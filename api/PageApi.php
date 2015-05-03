<?php

namespace nligems\api;

use nligems\page\ComparePage;
use nligems\page\EditSystemPage;
use nligems\page\FilterPage;
use nligems\page\IndexPage;
use nligems\page\NewsPage;
use nligems\page\SystemOverviewPage;
use nligems\page\SystemPage;
use nligems\page\TimeLinePage;

/**
 * @author Patrick van Bergen
 */
class PageApi
{
	public function __construct()
	{
		session_start();
	}

	/**
	 * @return IndexPage
	 */
	public function getIndexPage()
	{
		return new IndexPage();
	}

	/**
	 * @return IndexPage
	 */
	public function getNewsPage()
	{
		return new NewsPage();
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

	/**
	 * @param int[] $systemIds
	 * @return ComparePage
	 */
	public function getComparePage($systemIds)
	{
		return new ComparePage($systemIds);
	}

	/**
	 * @return SystemOverviewPage
	 */
	public function getSystemOverviewPage()
	{
		return new SystemOverviewPage();
	}

	/**
	 * @param NliSystem $NliSystem
	 * @return EditSystemPage
	 */
	public function getEditSystemPage(NliSystem $NliSystem)
	{
		return new EditSystemPage($NliSystem);
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
