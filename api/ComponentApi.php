<?php

namespace nligems\api;

use nligems\api\component\Bullets;
use nligems\api\component\DataStore;
use nligems\api\component\DefinitionList;
use nligems\api\component\ExternalEntity;
use nligems\api\component\Process;
use nligems\api\component\Table;

/**
 * @author Patrick van Bergen
 */
class ComponentApi
{
	/**
	 * @param $rows
	 * @param $columns
	 * @return Table
	 */
	public function createTable($rows, $columns)
	{
		return new Table($rows, $columns);
	}

	/**
	 * @return Bullets
	 */
	public function createBullets()
	{
		return new Bullets();
	}

	/**
	 * @return DefinitionList
	 */
	public function createDefinitionList()
	{
		return new DefinitionList();
	}

	/**
	 * @return ExternalEntity
	 */
	public function createExternalEntity()
	{
		return new ExternalEntity();
	}

	/**
	 * @return DataStore
	 */
	public function createDataStore()
	{
		return new DataStore();
	}

	/**
	 * @return Process
	 */
	public function createProcess()
	{
		return new Process();
	}
}
