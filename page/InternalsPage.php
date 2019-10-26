<?php

namespace nligems\page;

use nligems\api\component\Header;
use nligems\api\component\HtmlElement;
use nligems\api\component\TocParser;
use nligems\api\page\FrontEndPage;
use Parsedown;

require_once __DIR__ . '/../api/component/ParseDown.php';

/**
 * @author Patrick van Bergen
 */
class InternalsPage extends FrontEndPage
{

    public function __construct()
    {
        $this->Header = new Header('internals.php', 'NLI internals');

        $this->addStyleSheet('common');
        $this->addStyleSheet('internals');
    }

    protected function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $markdown = file_get_contents(__DIR__ . '/../doc/internals.md');

        $pd = new Parsedown();
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