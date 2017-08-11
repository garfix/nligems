<?php

namespace nligems\page;

use nligems\api\component\Header;
use nligems\api\component\HtmlElement;
use nligems\api\component\LinkBar;
use nligems\api\LinkApi;
use nligems\api\page\FrontEndPage;
use Parsedown;

require_once __DIR__ . '/../api/component/ParseDown.php';

/**
 * @author Patrick van Bergen
 */
class NliSystemPage extends FrontEndPage
{

    public function __construct()
    {
        $this->Header = new Header('The NLI System', 'index');

        $LinkApi = new LinkApi();

        $this->LinkBar = new LinkBar();

        foreach (file(__DIR__ . '/../doc/nli-system/order.txt') as $filename) {
            $id = trim($filename);
            $this->LinkBar->addLink(ucfirst($id), $LinkApi->getLink('nli-system', ['id' => $id]));
        }

        $this->addStyleSheet('common');
        $this->addStyleSheet('elements');
    }

    protected function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addClass('header');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 'introduction';
        $markdown = file_get_contents(__DIR__ . '/../doc/nli-system/' . $id . '.md');

        $pd = new Parsedown();
        $html = $pd->text($markdown);

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