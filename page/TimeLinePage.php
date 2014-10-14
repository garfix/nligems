<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\component\TimeTable;
use nligems\api\NliSystemApi;
use nligems\api\component\Header;
use nligems\api\page\Page;

/**
 * @author Patrick van Bergen
 */
class TimeLinePage extends Page
{
    /** @var TimeTable  */
    private $TimeTable;

    public function __construct(NliSystemApi $NliSystemApi)
    {
        $this->Header = new Header('Timeline', 'index');

        $this->TimeTable = new TimeTable();

        $this->fillTimeTableWithSystems($this->TimeTable);
        $this->fillTimeTableWithEvents($this->TimeTable);

        $this->addStyleSheet('common');
        $this->addStyleSheet('timeline');
    }

    private function fillTimeTableWithSystems(TimeTable $TimeTable)
    {
        $NliSystemApi = new NliSystemApi();

        foreach ($NliSystemApi->getAllSystems() as $System) {
            $TimeTable->addEntry($System->getFirstYear(), 'Start of ' . $System->getName());
        }
    }

    private function fillTimeTableWithEvents(TimeTable $TimeTable)
    {
        foreach (file(__DIR__ . '/../doc/history.txt') as $line) {
            if (preg_match('/^(\d+) (.*)/', $line, $matches)) {
                $year = $matches[1];
                $content = $matches[2];
                $TimeTable->addEntry($year, $content);
            }
        }
    }

    public function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addClass('header');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildHtml($this->TimeTable);
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}