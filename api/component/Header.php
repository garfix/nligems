<?php

namespace nligems\api\component;
use nligems\api\LinkApi;
use nligems\api\PageApi;

/**
 * @author Patrick van Bergen
 */
class Header
{
    /** @var  string */
    private $pageTitle;

    /** @var  string */
    private $backPage;

    public function __construct($pageTitle, $backPage)
    {
        $this->pageTitle = $pageTitle;
        $this->backPage = $backPage;
    }

    public function __toString()
    {
        $LinkApi = new LinkApi();

        $H1 = new HtmlElement('h1');
        $H1->addChildText('Natural Language Interface Gems');

        $SubTitle = new HtmlElement('h3');
        $SubTitle->addChildText($this->pageTitle);

        $Header = new HtmlElement('div');
        $Header->addAttribute('class', 'header');

        if ($this->backPage) {

            $Link = new HtmlElement('a');
            $Link->addAttribute('href', $LinkApi->getLink($this->backPage));
            $Link->addClass('backButton');
            $Header->addChildNode($Link);

            $BackImage = new HtmlElement('img', false);
            $BackImage->addAttribute('src', 'page/img/back.png');
            $Link->addChildNode($BackImage);
        }

        $Header->addChildNode($H1);
        $Header->addChildNode($SubTitle);

        return (string)$Header;
    }
}
