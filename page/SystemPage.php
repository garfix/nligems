<?php

namespace nligems\page;

use nligems\api\component\Bullets;
use nligems\api\component\CharacteristicsList;
use nligems\api\component\DataFlow;
use nligems\api\component\Header;
use nligems\api\component\HtmlElement;
use nligems\api\component\ImageBar;
use nligems\api\Features;
use nligems\api\LinkApi;
use nligems\api\NliSystem;
use nligems\api\NliSystemApi;
use nligems\api\page\FrontEndPage;
use nligems\api\PageApi;

/**
 * @author Patrick van Bergen
 */
class SystemPage extends FrontEndPage
{
    /** @var  NliSystem */
    private $System;

    /** @var ImageBar */
    private $ImageBar;

    public function __construct(NliSystem $NliSystem)
   	{
        $LinkApi = new LinkApi();

        $this->System = $NliSystem;

        $this->Header = new Header($NliSystem->getName(), $this->getBackPage());

        $this->ImageBar = new ImageBar();
        foreach ($NliSystem->get(Features::CONTRIBUTORS) as $contributor) {
            $this->ImageBar->addImage($contributor, $LinkApi->getLink('image', array('name' => $contributor)));
        }

        $this->addStyleSheet('common');
        $this->addStyleSheet('system');
        $this->addStyleSheet('dataflow');
        $this->addStyleSheet('characteristics');
   	}

    protected function getBody()
    {
        $NliSystemApi = new NliSystemApi();
        $System = $this->System;

        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addClass('header');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $ImageBar = new HtmlElement('div');
        $ImageBar->addClass('imagePanel');
        if (count($System->get(Features::CONTRIBUTORS)) == 1) {
            $ImageBar->addClass('thin');
        }
        $ImageBar->addChildHtml((string)$this->ImageBar);
        $Page->addChildNode($ImageBar);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Page->addChildNode($Body);

        $Img = new HtmlElement('img', false);
		$Img->addAttribute('src', 'page/img/gems/' . $NliSystemApi->getGemImageForSystem($System->getId()));
        $Img->addClass('nameGem');
        $Body->addChildNode($Img);

        $H2 = new HtmlElement('h2');
        $H2->addChildText($System->getName());
        $Body->addChildNode($H2);

        $Desc = new HtmlElement('p');
        $Desc->addChildText($System->get(Features::FIRST_YEAR) . ' - ' . $System->get(Features::LAST_YEAR));
        $Desc->addChildText(', ');
        $Desc->addChildText(implode(', ', $System->get(Features::CONTRIBUTORS)));

        if ($institutions = $System->get(Features::INSTITUTIONS)) {
            $Desc->addChildText(' ' . '(' . implode(', ', $institutions) . ')');
        }

        if ($sourceCodeUrl = $System->get(Features::SOURCE_CODE_URL)) {
            $Link = new HtmlElement('a');
            $Link->addAttribute('href', $sourceCodeUrl);
            $Link->addAttribute('target', '_blank');
            $Link->addChildText('source code');
            $Desc->addChildHtml(' ' . '[' . (string)$Link . ']');
        }

        $Body->addChildNode($Desc);

        if ($nameDescription = $System->get(Features::NAME_DESCRIPTION)) {

            $H2 = new HtmlElement('h2');
            $H2->addChildText('An explanation of the name');
            $Body->addChildNode($H2);

            $P = new HtmlElement('p');
            $P->addChildText($nameDescription);
            $Body->addChildNode($P);
        }

        $H2 = new HtmlElement('h2');
        $H2->addChildText('This is a gem, because');
        $Body->addChildNode($H2);

        $P = new HtmlElement('p');
        $P->addChildHtml(str_replace("\n\n", '<br><br>', $System->get(Features::LONG_DESCRIPTION)));
        $Body->addChildNode($P);

        $H2 = new HtmlElement('h2');
        $H2->addChildText('Characteristics');
        $Body->addChildNode($H2);

        $CharacteristicsList = new CharacteristicsList($System);
        $Body->addChildHtml($CharacteristicsList);

        $H2 = new HtmlElement('h2');
        $H2->addChildText('Data flow');
        $Body->addChildNode($H2);

        $DataFlow = new DataFlow();
        $DataFlow->setShowHeaders(false);
        $DataFlow->addSystem($System);
        $Body->addChildHtml("<CENTER>" .  $DataFlow . "</CENTER>");

        if ($System->get(Features::BOOKS)) {
            $H2 = new HtmlElement('h2');
            $H2->addChildText('Books');
            $Body->addChildNode($H2);

            $Bullets = new Bullets();
            $Bullets->addClass('articles');
            foreach ($System->get(Features::BOOKS) as $book) {
                $Bullets->addItem($book);
            }
            $Body->addChildHtml((string)$Bullets);
        }

        if ($System->get(Features::ARTICLES)) {
            $H2 = new HtmlElement('h2');
            $H2->addChildText('Articles');
            $Body->addChildNode($H2);

            $Bullets = new Bullets();
            $Bullets->addClass('articles');
            foreach ($System->get(Features::ARTICLES) as $article) {
                $Bullets->addItem($article);
            }
            $Body->addChildHtml((string)$Bullets);
        }

        return (string)$Page;
    }

    public function getBackPage()
    {
        $PageApi = new PageApi();

        return $PageApi->getSecondaryPage();
    }
}
