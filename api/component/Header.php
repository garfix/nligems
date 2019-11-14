<?php

namespace nligems\api\component;

use nligems\api\LinkApi;

/**
 * @author Patrick van Bergen
 */
class Header
{
    /** @var  string */
    private $pageTitle;

    /** @var  string */
    private $backPage;

    /** @var  */
    private $activePage;

    public function __construct($activePage, $pageTitle, $backPage = null)
    {
        $this->activePage = $activePage;
        $this->pageTitle = $pageTitle;
        $this->backPage = $backPage;
    }

    public function __toString()
    {
        $LinkApi = new LinkApi();

        $H1 = new HtmlElement('h1');
        $H1->addChildText('Natural Language Interface Gems');

        $Header = new HtmlElement('div');
        $Header->addAttribute('class', 'header');


        $Link = new HtmlElement('a');
        $Link->addAttribute('href', $LinkApi->getLink("/"));
        $Link->addClass('homeButton');
        $Header->addChildNode($Link);

        $HomeImage = new HtmlElement('img', false);
        $HomeImage->addAttribute('src', '/page/img/home.png');
        $Link->addChildNode($HomeImage);

        $Header->addChildNode($H1);

        $menu = [
            '/internals' => "The NLI system",
            '/all-systems' => "Systems",
            '/timeline' => "Timeline",
            '/news' => "News",
            '/interview' => "Interview",
        ];

        $Bar = new HtmlElement('div');
        $Bar->addClass('linkBar');

        foreach ($menu as $link => $text) {
            $link = new Link($text, $link, $link == $this->activePage);
            $Bar->addChildHtml((string)$link);
        }

        $Header->addChildNode($Bar);

        return (string)$Header;
    }
}
