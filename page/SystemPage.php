<?php

namespace nligems\page;

use nligems\api\component\Bullets;
use nligems\api\component\CharacteristicsList;
use nligems\api\component\DataFlow;
use nligems\api\component\Header;
use nligems\api\component\HtmlElement;
use nligems\api\component\ImageBar;
use nligems\api\LinkApi;
use nligems\api\NliSystem;
use nligems\api\page\Page;
use nligems\api\PageApi;

/**
 * @author Patrick van Bergen
 */
class SystemPage extends Page
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
        foreach ($NliSystem->getContributors() as $contributor) {
            $this->ImageBar->addImage($contributor, $LinkApi->getLink('image', array('name' => $contributor)));
        }

        $this->addStyleSheet('common');
        $this->addStyleSheet('system');
        $this->addStyleSheet('dataflow');
        $this->addStyleSheet('characteristics');
   	}

    protected function getBody()
    {
        $System = $this->System;

        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addClass('header');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $ImageBar = new HtmlElement('div');
        $ImageBar->addClass('imagePanel');
        if (count($System->getContributors()) == 1) {
            $ImageBar->addClass('thin');
        }
        $ImageBar->addChildHtml((string)$this->ImageBar);
        $Page->addChildNode($ImageBar);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Page->addChildNode($Body);

        $H2 = new HtmlElement('h2');
        $H2->addChildText($System->getName());
        $Body->addChildNode($H2);

        $Desc = new HtmlElement('p');
        $Desc->addChildText($System->getFirstYear() . ' - ' . $System->getLastYear());
        $Desc->addChildText(', ');
        $Desc->addChildText(implode(', ', $System->getContributors()));

        if ($institutions = $System->getInstitutions()) {
            $Desc->addChildText(' ' . '(' . implode(', ', $institutions) . ')');
        }

        $Body->addChildNode($Desc);

        if ($nameDescription = $System->getNameDescription()) {

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
        $P->addChildHtml(str_replace("\n\n", '<br><br>', $System->getLongDescription()));
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

        $H2 = new HtmlElement('h2');
        $H2->addChildText('Books and Articles');
        $Body->addChildNode($H2);

        $Bullets = new Bullets();
        $Bullets->addClass('articles');
        foreach ($System->getArticles() as $article) {
            $Bullets->addItem($article);
        }

        $Body->addChildHtml((string)$Bullets);

        return (string)$Page;
    }

    public function getBackPage()
    {
        $PageApi = new PageApi();

        return $PageApi->getSecondaryPage();
    }
}
