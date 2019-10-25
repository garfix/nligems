<?php

namespace nligems\api\component;

use DOMDocument;

class TocParser
{
    public function createTocHtml($html)
    {
        $dom = new DOMDocument();
        $htmlArray = [];

        // Load html including utf8, like Hebrew
        $dom->loadHTML($html);

        for ($i = 1; $i <= 6; $i++) {
            foreach ($dom->getElementsByTagName('h' . $i) as $header) {
                $id = $header->getAttribute('id');
                $order = $header->getAttribute('order');
                $htmlArray[$order] = $this->createHtml($header->textContent, $i, $id);
            }
        }

        ksort($htmlArray);

        return "<div class='toc'>" . implode($htmlArray) . "</div>";
    }

    protected function createHtml($text, $level, $id)
    {
        return str_repeat("&nbsp;", 4 * ($level - 1)) . "<a href='#" . $id . "'>" . htmlspecialchars($text) . "</a><br>";
    }
}