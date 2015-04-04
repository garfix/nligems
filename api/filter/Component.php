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

	/** @var HelpButton */
	protected $HelpButton = null;

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
	 * @param HelpButton $HelpButton
	 */
	public function setHelpButton(HelpButton $HelpButton)
	{
		$this->HelpButton = $HelpButton;
	}

	/**
	 * @param NliSystem $System
	 * @return bool
	 */
	public function matches(NliSystem $System)
	{
		return true;
	}

	/**
	 * @param NliSystem $System
	 */
	public function storeMatches(NliSystem $System)
	{
	}

	public function hasMatches()
	{
		return false;
	}
}
