<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
abstract class GaneAndSarsonComponent
{
	protected $header;
	protected $content;

	/**
	 * @param $header
	 * @return $this
	 */
	public function setHeader($header)
	{
		$this->header = $header;
		return $this;
	}

	/**
	 * @param $content
	 * @return $this
	 */
	public function setContent($content)
	{
		$this->content = $content;
		return $this;
	}

	abstract public function __toString();

}
