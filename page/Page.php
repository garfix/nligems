<?php

namespace nligems\page;

/**
 * @author Patrick van Bergen
 */
abstract class Page
{
	/** @var string  */
	protected $template = 'nligems';

	/** @var array[]  */
	protected $styleSheets = ['style'];

	/** @var array[]  */
	protected $scripts = [];

	public function __toString()
	{
		$body = $this->getBody();

		return str_replace(array(
			'##body##',
			'##styles##',
			'##scripts##',
		), array(
			$body,
			$this->getStyles(),
			$this->getScripts(),
		),
		$this->getTemplate());
	}

	public function addStyleSheet($styleSheet)
	{
		$this->styleSheets[] = $styleSheet;
	}

	public function addScript($script)
	{
		$this->scripts[] = $script;
	}

	private function getStyles()
	{
		$styleHtml = '';

		foreach ($this->styleSheets as $styleSheet) {
			$styleHtml .= "<link rel='stylesheet' type='text/css' href='page/css/" . $styleSheet . ".css' />\n";
		}

		return $styleHtml;
	}


	private function getScripts()
	{
		$scriptHtml = '';

		foreach ($this->scripts as $script) {
			$scriptHtml .= "<script src='page/script/" . $script. ".js'></script>\n";
		}

		return $scriptHtml;
	}

	private function getTemplate()
	{
		return file_get_contents(__DIR__ . '/template/' . $this->template . '.html');
	}

	protected abstract function getBody();
}
