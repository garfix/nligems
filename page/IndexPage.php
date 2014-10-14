<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\component\LinkBar;
use nligems\api\component\Header;
use nligems\api\LinkApi;
use nligems\api\page\Page;

/**
 * @author Patrick van Bergen
 */
class IndexPage extends Page
{
    public function __construct()
   	{
        $LinkApi = new LinkApi();

        $this->Header = new Header('Home', null);

        $this->LinkBar = new LinkBar();
        $this->LinkBar->addLink('Filter', $LinkApi->getLink('filter'));
        $this->LinkBar->addLink('Time line', $LinkApi->getLink('timeline'));

        $this->addStyleSheet('common');
        $this->addStyleSheet('index');
   	}

    protected function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addClass('header');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $html = file_get_contents(__DIR__ . '/text/intro.html');

        $LinkBar = new HtmlElement('div');
        $LinkBar->addClass('linkPanel');
        $LinkBar->addChildHtml((string)$this->LinkBar);
        $Page->addChildNode($LinkBar);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildHtml($html);
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}
