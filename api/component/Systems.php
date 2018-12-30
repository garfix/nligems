<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Systems extends HtmlElement
{
	/** @var  array */
	private $allSystemInfo;

	public function __construct(array $allSystemInfo)
	{
		$this->allSystemInfo = $allSystemInfo;
	}

	public function __toString()
	{
		date_default_timezone_set('Europe/Amsterdam');

		$html = "";

		foreach ($this->allSystemInfo as $systemInfo) {

		    $firstYear = $systemInfo['FIRST_YEAR'];
            $lastYear = $systemInfo['LAST_YEAR'];

            if ($lastYear == $firstYear || empty($lastYear)) {
                $period = " <span>({$firstYear})";
            } else {
                $period = " <span>({$firstYear} - {$lastYear})";
            }

			$html .= "<h3>" . htmlspecialchars($systemInfo['NAME']) . $period . "</h3>";

            $html .= "<div class='contributors'>" . implode(", ", $systemInfo['CONTRIBUTORS']) . "</div>";

            $html .= "<p class='story'>" . nl2br(htmlspecialchars($systemInfo['LONG_DESC'])) . "</p>";

            if (!empty($systemInfo['ARTICLES'])) {
                $html .= "<h4>Articles</h4>";
                $html .= "<ul class='articles'>";
                foreach ($systemInfo['ARTICLES'] as $article) {
                    $html .= "<li>" . htmlspecialchars($article) . "</li>";
                }
                $html .= "</ul>";
            }
            if (!empty($systemInfo['BOOKS'])) {
                $html .= "<h4>Books</h4>";
                $html .= "<ul class='articles'>";
                foreach ($systemInfo['BOOKS'] as $book) {
                    $html .= "<li>" . htmlspecialchars($book) . "</li>";
                }
                $html .= "</ul>";
            }
		}

		return $html;
	}
}
