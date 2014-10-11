<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\component\LinkBar;
use nligems\api\component\Header;
use nligems\api\LinkApi;

/**
 * @author Patrick van Bergen
 */
class IndexPage extends Page
{
    /** @var  Header */
   	protected $Header;

    public function __construct()
   	{
        $this->Header = new Header('Home');
        $this->LinkBar = new LinkBar();

        $LinkApi = new LinkApi();

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
