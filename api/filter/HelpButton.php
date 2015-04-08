<?php

namespace nligems\api\filter;

use nligems\api\component\HtmlElement;

/**
 * @author Patrick van Bergen
 */
class HelpButton extends HtmlElement
{
	private $explanationHtml;

	public function __construct($featureName, $explanationHtml)
	{
		$this->featureName = $featureName;
		$this->explanationHtml = $explanationHtml;
	}

	public function __toString()
	{
		return "
			<input class='help' type='button' value='?' />
			<div class='help-popup'>
				<header>" . htmlspecialchars($this->featureName) . "</header>" .
				$this->microformatToHtml($this->explanationHtml) . '
			</div>';
	}

	/**
	 * Turns my custom microformat into html.
	 *
	 * - replace all newlines by <p> elements
	 * - formats
	 *
	 *      ## header
	 *      a: x
	 *      b: y
	 *
	 *  as
	 *
	 *      <table class='example'>
	 *          <caption> header </caption>
	 *          <tr><td class='name'> a </td><td> x </td></tr>
	 *          <tr><td class='name'> b </td><td> y </td></tr>
	 *      </table>
	 *
	 * @param string $microformat
	 * @return string HTML
	 */
	private function microformatToHtml($microformat)
	{
		$quote = function($matches)
		{
			$header = $matches['header'];
			$quoteLines = array_filter(explode("\n", $matches['quotes']));

			$rows = '';

			foreach ($quoteLines as $quoteLine) {

				preg_match('/([^:]+):(.*)/', $quoteLine, $matches);
				$name = $matches[1];
				$quote = $matches[2];

				$rows .= "<tr><td class='name'>" . trim($name) . "</td><td>" . trim($quote) . "</td></tr>";
			}

			$string =  "<table class='example'>" .
				"<caption>" . trim($header) . "</caption>" .
				$rows .
				"</table>";

			return $string;
		};

		$definitions = function($matches)
		{
			$definitionLines = array_filter(explode("\n", $matches['defs']));

			$body = '';

			foreach ($definitionLines as $definitionLine) {

				preg_match('/([^:]+):=(.*)/', $definitionLine, $matches);
				$name = $matches[1];
				$value = $matches[2];

				$body .= "<dt>" . trim($name) . "</dt><dd>" . trim($value) . "</dd>";
			}

			$string =  "<dl>" . $body . "</dl>";

			return $string;
		};

		$paragraphs = function($matches)
		{
			return "<br><br>";
		};

		$html = $microformat;
		$html = preg_replace_callback('/##[\s]*(?<header>[^\n]+)\n(?<quotes>([^:]+:[^\n$]+)*)/', $quote, $html);
		$html = preg_replace_callback('/(\n|^)(?<defs>([^\n:]+:=[^\n]+\n)+)/', $definitions, $html);
		$html = preg_replace_callback('/(\n\n)/', $paragraphs, $html);

		return $html;
	}
}
