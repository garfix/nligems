<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Link
{
    /** @var  string */
    private $text;

    /** @var  string */
    private $link;

    public function __construct($text, $link)
    {
        $this->text = $text;
        $this->link = $link;
    }

    public function __toString()
    {
        $Div = new HtmlElement('div');

            $Link = new HtmlElement('a');
            $Link->addAttribute('href', $this->link);
            $Link->addChildText($this->text);
            $Div->addChildNode($Link);

        return (string)$Div;
    }
}
