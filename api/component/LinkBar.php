<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class LinkBar
{
    /** @var Link[] */
    private $links = [];

    public function addLink($text, $link)
    {
        $this->links[] = new Link($text, $link);
    }

    public function __toString()
    {
        $Bar = new HtmlElement('div');
        $Bar->addClass('linkBar');

        foreach ($this->links as $Link) {
            $Bar->addChildHtml((string)$Link);
        }

        return (string)$Bar;
    }
}
