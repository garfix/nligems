<?php

namespace nligems\page;

use nligems\api\component\CharacteristicsList;
use nligems\api\component\DataFlow;
use nligems\api\component\Header;
use nligems\api\component\HtmlElement;
use nligems\api\component\Table;
use nligems\api\NliSystem;
use nligems\api\NliSystemApi;
use nligems\api\page\Page;
use nligems\api\PageApi;

/**
 * @author Patrick van Bergen
 */
class ComparePage extends Page
{
    /** @var DataFlow  */
    private $DataFlow;

    private $systems = array();

	public function __construct($systemIds)
	{
        $NliSystemApi = new NliSystemApi();

        // collect the systems
        /** @var NliSystem[] $systems */
        $systems = array();
        foreach ($systemIds as $systemId) {

            $System = $NliSystemApi->getSystem($systemId);
            if ($System) {
                $systems[] = $System;
            }
        }
        $this->systems = $systems;

        // create the header
        $header = 'Compare';

        if (count($systemIds) > 2) {
            foreach ($systems as $index => $System) {
                $header .= ($index == 0 ? ' ' : ', ') . $System->getName();
            }
        } elseif (count($systemIds) > 1) {
            $header .= ' ' . $systems[0]->getName() . ' to ' . $systems[1]->getName();
        }
		$this->Header = new Header($header, $this->getBackPage());

        // create the dataflow
        $this->DataFlow = new DataFlow();
        foreach ($systems as $System) {
            $this->DataFlow->addSystem($System);
        }

		$this->addStyleSheet('common');
		$this->addStyleSheet('compare');
		$this->addStyleSheet('dataflow');
        $this->addStyleSheet('characteristics');

        $this->addScript('systemnames');
	}

	protected function getBody()
	{
		$Page = new HtmlElement('div');
		$Page->addClass('page');

		$Header = new HtmlElement('div');
		$Header->addClass('header');
		$Header->addChildHtml((string)$this->Header);
		$Page->addChildNode($Header);

        $SystemNames = new HtmlElement('div');
        $SystemNames->addClass('systemNames');
        foreach ($this->systems as $System) {

            $SystemName = new HtmlElement('div');
            $SystemName->addChildHtml($System->getName());
            $SystemNames->addChildNode($SystemName);
        }
        $Page->addChildNode($SystemNames);

        $Body = new HtmlElement('div');
        $Body->addClass('body');
        $Page->addChildNode($Body);

        $H2 = new HtmlElement('h2');
        $H2->addChildText('Characteristics');
        $Body->addChildNode($H2);

        $CharacteristicsTable = new Table(1, count($this->systems));
        $CharacteristicsTable->setClass('characteristics');
        $CharacteristicsTable->treatCellContentsAsHtml();
        foreach ($this->systems as $i => $System) {
            $CharacteristicsList = new CharacteristicsList($System);
            $CharacteristicsTable->set(0, $i, $CharacteristicsList);
        }
        $Body->addChildHtml((string)$CharacteristicsTable);

        $H2 = new HtmlElement('h2');
        $H2->addChildText('Data flow');
        $Body->addChildNode($H2);

        $Body->addChildHtml((string)$this->DataFlow);

		return (string)$Page;
	}

	public function getBackPage()
	{
		$PageApi = new PageApi();

		return $PageApi->getSecondaryPage();
	}
}
