<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Table
{
	private $cellsAreHtml = false;
	private $caption = '';
	private $headers = array();
	private $sideHeaders = array();
	private $sideHeadersUsed = false;
	private $cells = array();
	private $class = '';

	public function __construct($rows, $columns)
	{
		$this->headers = array_fill(0, $columns, '');
		$this->sideHeaders = array_fill(0, $rows, '');

		for ($r = 0; $r < $rows; $r++) {
			$this->cells[] = array_fill(0, $columns, '');
		}
	}

	public function setClass($class)
	{
		$this->class = $class;
	}

	public function treatCellContentsAsHtml()
	{
		$this->cellsAreHtml = true;
	}

	public function set($row, $column, $value)
	{
		$this->cells[$row][$column] = $value;
	}

	public function setCaption($caption)
	{
		$this->caption = $caption;
	}

	public function setHeader($column, $header)
	{
		$this->headers[$column] = $header;
	}

	public function setSideHeader($row, $header)
	{
		$this->sideHeaders[$row] = $header;
		$this->sideHeadersUsed = true;
	}

	public function getCells()
	{
		return $this->cells;
	}

	public function getHeaders()
	{
		return $this->headers;
	}

	public function getSideHeaders()
	{
		return $this->sideHeaders;
	}

	public function __toString()
	{
		$class = $this->class;

		$html = "<table class='$class'>";
		$html .= "<caption>" . htmlspecialchars($this->caption) . "</caption>";
		$html .= "<thead><tr>";

		if ($this->sideHeadersUsed) {
			$html .= "<th></th>";
		}

		foreach ($this->headers as $header) {

			$html .= "<th>" . htmlspecialchars($header) . "</th>";

		}

		$html .= "</tr></thead>";

		foreach ($this->cells as $row => $cells) {

			$class = $row % 2 == 1 ? 'odd' : 'even';
			$html .= "<tr class='$class'>";

			if ($this->sideHeadersUsed) {
				$html .= "<td class='sideHeader'>" . htmlspecialchars($this->sideHeaders[$row]) . "</td>";
			}

			foreach ($cells as $cell) {

				if ($this->cellsAreHtml) {
					$contents = $cell;
				} else {
					$contents = htmlspecialchars($cell);
				}

				$html .= "<td>" . $contents . "</td>";
			}

			$html .= "</tr>";
		}

		$html .= '</table>';

		return $html;
	}
}
