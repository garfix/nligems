<?php

namespace nligems\page\api\component;

/**
 * @author Patrick van Bergen
 */
class News extends HtmlElement
{
	/** @var  array */
	private $news;

	public function __construct(array $news)
	{
		$this->news = $news;
	}

	public function __toString()
	{
		date_default_timezone_set('Europe/Amsterdam');

		$elements = array();

		foreach ($this->news as $newsItem) {

			$time = strtotime($newsItem['date']);
			$date = date('j F Y', $time);

			$elements[] =
				"<h3>" . htmlspecialchars($date) . "</h3>" .
				"<p class='story'>" . nl2br(htmlspecialchars($newsItem['story'])) . "</p>"
			;

		}

		return "<div class='content'>" . implode($elements) . "</div>";
	}
}
