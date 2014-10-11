<?php

namespace nligems\api\component;

use nligems\api\component\HtmlElement;

/**
 * @author Patrick van Bergen
 */
class Header
{
    /** @var  string */
    private $pageTitle;

    public function __construct($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    public function __toString()
    {
        $Img = new HtmlElement('img', false);
        $Img->addAttribute('src', 'page/img/gems.jpg');

        $H1 = new HtmlElement('h1');
        $H1->addChildText('Natural Language Interface Gems');

        $SubTitle = new HtmlElement('h3');
        $SubTitle->addChildText($this->pageTitle);

        $Header = new HtmlElement('div');
        $Header->addAttribute('class', 'header');
        $Header->addChildNode($Img);
        $Header->addChildNode($H1);
        $Header->addChildNode($SubTitle);

        return (string)$Header;
    }
}
