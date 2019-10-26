<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class TitleParser
{
    public function createTocHtml($html)
    {
        $htmlArray = [];

        preg_match_all("|<h3 id='([^']+)'>([^<]+)|", $html, $matches);

        foreach ($matches[1] as $index => $id) {
            $title = $matches[2][$index];
            $htmlArray[$id] = $this->createHtml($title, $id);
        }

        ksort($htmlArray);

        return "<div class='toc'>" . implode($htmlArray) . "</div>";
    }

    protected function createHtml($text, $id)
    {
        return "<a href='#" . $id . "'>" . htmlspecialchars($text) . "</a><br>";
    }
}