<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class AllSystems extends HtmlElement
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
                $period = " <span class='year'>({$firstYear})";
            } else {
                $period = " <span class='year'>({$firstYear} - {$lastYear})";
            }

            if (!empty($systemInfo['NAME_DESC'])) {
                $description = " <br><span class='desc'>" . $systemInfo['NAME_DESC'] . "</span>";
            } else {
                $description = "";
            }

			$html .= "<h3>" . htmlspecialchars($systemInfo['NAME']) . $period . $description . "</h3>";

            $html .= "<div class='contributors'>" .
                implode(", ", $systemInfo['CONTRIBUTORS']) .
                (!empty($systemInfo['INSTITUTIONS']) ? " / " . implode(", ", $systemInfo['INSTITUTIONS']): "") .
                "</div>";

            if (!empty($systemInfo['LONG_DESC'])) {
                $html .= "<p class='story'>" . nl2br(htmlspecialchars($systemInfo['LONG_DESC'])) . "</p>";
            }

            if (!empty($systemInfo['BOOKS'])) {
                $html .= "<h4>Books</h4>";
                $html .= "<ul class='articles'>";
                foreach ($systemInfo['BOOKS'] as $book) {
                    $html .= "<li>" . htmlspecialchars($book) . "</li>";
                }
                $html .= "</ul>";
            }
            if (!empty($systemInfo['ARTICLES'])) {
                $html .= "<h4>Articles</h4>";
                $html .= "<ul class='articles'>";
                foreach ($systemInfo['ARTICLES'] as $article) {
                    $html .= "<li>" . htmlspecialchars($article) . "</li>";
                }
                $html .= "</ul>";
            }

            $html .= "<div class='ruler'>&nbsp;</div>";
		}

        $html .= "<h3>References</h3>";
		$html .= "<p>Much of the information in this text was drawn from:</p>";
		$html .= "<ul>
		    <li>Answering English Questions by Computer: A Survey - R.F. Simmons (1965)</li>
		    <li>Natural Language Question-Answering Systems: 1969 - R.F. Simmons (1970)</li>
		    <li>Natural Language Interfaces to Databases – An Introduction - I. Androutsopoulos, G.D. Ritchie, P. Thanisch (1995)</li>
		    <li>Into the heart of the mind (1984), F. Rose</li>
		</ul>
		<p>\"Into the heart of the mind\" is translated in Dutch as \"De leerlingen van Frankenstein\", which I think is brilliant :)";

		return $html;
	}
}
