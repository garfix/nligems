<?php

namespace nligems\page;

use nligems\page\api\component\HtmlElement;
use nligems\page\api\component\Header;

/**
 * @author Patrick van Bergen
 */
class IndexPage extends FrontEndPage
{
    public function __construct()
   	{
        $this->Header = new Header('/', 'Home', null);

        $this->addStyleSheet('common');
        $this->addStyleSheet('index');
   	}

    protected function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $html = file_get_contents(__DIR__ . '/../doc/intro.html');

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildHtml("<div class='content'>" . $html . "</div>");
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}
