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
class ElementsPage extends FrontEndPage
{

    public function __construct()
    {
        $this->Header = new Header('Elements of NLI', 'index');

        $LinkApi = new LinkApi();

        $this->LinkBar = new LinkBar();

        foreach (glob(__DIR__ . '/../doc/features/*') as $filename) {
            if (preg_match('/([0-9]+ ([a-zA-Z ]*)).md$/', $filename, $matches)) {
                $id = $matches[1];
                $name = $matches[2];
                $this->LinkBar->addLink(ucfirst($name), $LinkApi->getLink('elements', ['id' => $id]));
            }
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

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '01 elements';
        $markdown = file_get_contents(__DIR__ . '/../doc/features/' . $id . '.md');

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