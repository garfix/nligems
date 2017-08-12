<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\component\LinkBar;
use nligems\api\component\Header;
use nligems\api\LinkApi;
use nligems\api\page\FrontEndPage;

/**
 * @author Patrick van Bergen
 */
class IndexPage extends FrontEndPage
{
    public function __construct()
   	{
        $LinkApi = new LinkApi();

        $this->Header = new Header('Home', null);

        $this->LinkBar = new LinkBar();
        $this->LinkBar->addLink('The NLI system', $LinkApi->getLink('external', ['id' => 'introduction']));
        $this->LinkBar->addLink('NLI modules', $LinkApi->getLink('internal', ['id' => 'introduction']));
        $this->LinkBar->addLink('Systems Chart', $LinkApi->getLink('filter'));
        $this->LinkBar->addLink('NLI History', $LinkApi->getLink('timeline'));
        $this->LinkBar->addLink('Some remarks', $LinkApi->getLink('news'));

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
