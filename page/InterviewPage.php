<?php

namespace nligems\page;

use nligems\api\component\Header;
use nligems\api\component\HtmlElement;
use nligems\api\component\Interview;
use nligems\api\page\FrontEndPage;

/**
 * @author Patrick van Bergen
 */
class InterviewPage extends FrontEndPage
{
    public function __construct()
    {
        $this->Header = new Header('interview.php', 'Interview');
        $this->addStyleSheet('common');
        $this->addStyleSheet('interview');
    }

    protected function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $LinkBar = new HtmlElement('div');
        $LinkBar->addClass('linkPanel');
        $Page->addChildNode($LinkBar);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildNode(new Interview(null));
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}