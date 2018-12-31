<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\component\Header;
use nligems\api\component\AllSystems;
use nligems\api\page\FrontEndPage;

/**
 * @author Patrick van Bergen
 */
class AllSystemsPage extends FrontEndPage
{
    protected $allSystems;

    public function __construct()
   	{
        $this->Header = new Header('Systems');

        $this->addStyleSheet('common');
        $this->addStyleSheet('all-systems');

        $this->allSystems = $this->getAllSystems();
   	}

   	protected function getAllSystems()
    {
        $systems = [];

        foreach (glob(__DIR__ . '/../data/*.json') as $jsonFile) {
            $systems[] = json_decode(file_get_contents($jsonFile), true);
        }
        foreach (glob(__DIR__ . '/../data/semiprecious/*.json') as $jsonFile) {
            $systems[] = json_decode(file_get_contents($jsonFile), true);
        }

        $sortedSystems = [];
        foreach ($systems as $system) {

            if (empty($system['FIRST_YEAR'])) {
                continue;
            }

            $sortedSystems[$system['FIRST_YEAR'] . '-' . $system['NAME']] = $system;
        }

        ksort($sortedSystems);

        return $sortedSystems;
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

        $AllSystems = new AllSystems($this->allSystems);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildNode($AllSystems);
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}
