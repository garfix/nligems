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

    public function __construct($pageTitle, $backPage = null)
    {
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

        if ($this->backPage) {

            $Link = new HtmlElement('a');
            $Link->addAttribute('href', $LinkApi->getLink($this->backPage));
            $Link->addClass('backButton');
            $Header->addChildNode($Link);

            $BackImage = new HtmlElement('img', false);
            $BackImage->addAttribute('src', 'page/img/back.png');
            $Link->addChildNode($BackImage);

        } else {

            $Link = new HtmlElement('a');
            $Link->addAttribute('href', $LinkApi->getLink("index"));
            $Link->addClass('backButton');
            $Header->addChildNode($Link);

            $HomeImage = new HtmlElement('img', false);
            $HomeImage->addAttribute('src', 'page/img/home.png');
            $Link->addChildNode($HomeImage);
        }

        $Header->addChildNode($H1);

        $menu = [
            'internals.php' => "The NLI system",
            'filter.php' => "Systems chart",
            'timeline.php' => "Timeline",
            'news.php' => "News"
        ];

        $Bar = new HtmlElement('div');
        $Bar->addClass('linkBar');

        foreach ($menu as $link => $text) {
            $link = new Link($text, $link);
            $Bar->addChildHtml((string)$link);
        }

        $Header->addChildNode($Bar);

        return (string)$Header;
    }
}
