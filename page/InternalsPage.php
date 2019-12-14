<?php

namespace nligems\page;

use nligems\page\api\component\Header;
use nligems\page\api\component\HtmlElement;
use nligems\page\api\component\ParseDown;
use nligems\page\api\component\TocParser;

/**
 * @author Patrick van Bergen
 */
class InternalsPage extends FrontEndPage
{
    protected $title = "Internals";

    public function __construct()
    {
        $this->Header = new Header('internals', 'NLI internals');

        $this->addStyleSheet('common');
        $this->addStyleSheet('internals');
        $this->addStyleSheet('toc');
    }

    protected function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $markdown = file_get_contents(__DIR__ . '/../doc/internals.md');

        $pd = new ParseDown();
        $html = "<div class='content'>" . $pd->text($markdown) . "</div>";

        $indexParser = new TocParser();
        $tocHtml = $indexParser->createTocHtml($html);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildHtml($tocHtml);
        $Body->addChildHtml($html);
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}