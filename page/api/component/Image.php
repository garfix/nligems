<?php

namespace nligems\page\api\component;

/**
 * @author Patrick van Bergen
 */
class Image
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
        $Div->addClass('imageContainer');

        $Img = new HtmlElement('img', false);
        $Img->addAttribute('src', $this->link);
        $Div->addChildNode($Img);

        $Desc = new HtmlElement('div');
        $Desc->addClass('imageDescription');
        $Desc->addChildText($this->text);
        $Div->addChildNode($Desc);

        return (string)$Div;
    }
}
