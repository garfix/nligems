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

        $html = "<p>A collection of historic NLI systems. It is meant to give you a quick overview of the field, as a sort of index.</p><p>The term in <span class='functions'>blue</span> shows the main function.<br>The bullet points in the form of a gem - <img src='page/img/gem.png' /> - mark innovations.<br>In the dialogs, H: means the human user, and C: the computer system.</p><p class='intro'>Note that is a work-in-progress. -- Patrick</p>";

        foreach ($this->allSystemInfo as $systemInfo) {

		    $firstYear = $systemInfo['FIRST_YEAR'];
            $lastYear = $systemInfo['LAST_YEAR'];

            if ($lastYear == $firstYear || empty($lastYear)) {
                $period = " <span class='year'>({$firstYear})";
            } else {
                $period = " <span class='year'>({$firstYear} - {$lastYear})";
            }

            if (!empty($systemInfo['NAME_DESC'])) {
                $description = "<div class='desc'>" . $systemInfo['NAME_DESC'] . "</div>";
            } else {
                $description = "";
            }

            $function = "";
            if (!empty($systemInfo['FUNCTION'])) {
                $function = "<span class='functions'>" . $systemInfo['FUNCTION'] . "</span>";
            }

            $id = $systemInfo['ID'];

			$html .= "<a class='system-header' href='#{$id}'><h2 id='{$id}'>" . htmlspecialchars($systemInfo['NAME']) . "</h2>" . $period . $function . "</a>";

			$html .= $description;

            $html .= "<div class='contributors'>" .
                implode(", ", $systemInfo['CONTRIBUTORS']) .
                (!empty($systemInfo['INSTITUTIONS']) ? " / " . implode(", ", $systemInfo['INSTITUTIONS']): "") .
                "</div>";

            if (!empty($systemInfo['LONG_DESC'])) {
                $html .= $systemInfo['LONG_DESC'];
            }

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

            $html .= "<div class='ruler'>&nbsp;</div>";
		}

        $html .= "<h3>References</h3>";
		$html .= "<p>Much of the information in this text was drawn from:</p>";
		$html .= "<ul>
		    <li>Answering English Questions by Computer: A Survey - R.F. Simmons (1965)</li>
		    <li>Natural Language Question-Answering Systems: 1969 - R.F. Simmons (1970)</li>
		    <li>Into the heart of the mind - F. Rose (1984)</li>
		    <li>Natural Language Interfaces to Databases – An Introduction - I. Androutsopoulos, G.D. Ritchie, P. Thanisch (1995)</li>
		    <li>Question Answering Systems: Survey and Trends - A. Bouziane, D. Bouchiha, N. Doumi, M. Malki (2015)</li>
		</ul>
		<p>\"Into the heart of the mind\" is translated in Dutch as \"De leerlingen van Frankenstein\", which I think is brilliant :)";

		return $html;
	}
}
