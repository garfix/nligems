<?php

namespace nligems\page;

use nligems\api\component\Header;
use nligems\api\component\HtmlElement;
use nligems\api\component\Interview;

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

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildNode(new Interview($this->subject));
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}