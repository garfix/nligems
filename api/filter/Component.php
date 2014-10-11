<?php

namespace nligems\api\filter;

use nligems\api\NliSystem;

/**
 * @author Patrick van Bergen
 */
class Component
{
	/** @var  string */
	protected $id;

	/** @var  string */
	protected $description;

	/** @var  mixed */
	protected $value = null;

	public function __construct($id, $description)
	{
		$this->id = $id;
		$this->description = $description;
	}

	/**
	 * @param mixed $value
	 */
	public function setValue($value)
	{
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param NliSystem $System
	 * @return bool
	 */
	public function matches(NliSystem $System)
	{
		return true;
	}
}
