<?php

namespace nligems\page;

use nligems\page\api\component\Header;
use nligems\page\api\component\HtmlElement;
use nligems\page\api\component\Interview;

/**
 * @author Patrick van Bergen
 */
class InterviewPage extends FrontEndPage
{
    protected $subject;

    protected $title = "Interview";

    public function __construct($subject)
    {
        $this->subject = $subject;

        $this->Header = new Header('interview', 'Interview');
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

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildNode(new Interview($this->subject));
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}