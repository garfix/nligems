<?php

namespace nligems\page;

use nligems\api\component\Header;
use nligems\api\component\HtmlElement;
use nligems\api\component\ImageBar;
use nligems\api\LinkApi;
use nligems\api\NliSystem;
use nligems\api\page\Page;

/**
 * @author Patrick van Bergen
 */
class SystemPage extends Page
{
    /** @var  NliSystem */
    private $System;

    /** @var  Header */
   	protected $Header;

    /** @var ImageBar */
    private $ImageBar;

    public function __construct(NliSystem $NliSystem)
   	{
        $LinkApi = new LinkApi();

        $this->System = $NliSystem;

        $this->Header = new Header($NliSystem->getName());

        $this->ImageBar = new ImageBar();
        foreach ($NliSystem->getContributors() as $contributor) {
            $this->ImageBar->addImage($contributor, $LinkApi->getLink('image', array('name' => $contributor)));
        }

        $this->addStyleSheet('common');
        $this->addStyleSheet('system');
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
            $P = new HtmlElement('p');
            $P->addChildText($System->getNameDescription());
            $Body->addChildNode($P);
        }

        $H2 = new HtmlElement('h2');
        $H2->addChildText('This is a gem, because');
        $Body->addChildNode($H2);

        $P = new HtmlElement('p');
        $P->addChildText($System->getLongDescription());
        $Body->addChildNode($P);



// getInfluences()
// getNaturalLanguages()
// getProgrammingLanguages()
// getWebsite()
// getKnowledgeBaseType()
// getKnowledgeBaseTypeDescription()
// getSentenceTypes()
// getArticles()


        return (string)$Page;
    }
}
