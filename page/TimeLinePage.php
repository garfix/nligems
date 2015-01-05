<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\component\TimeTable;
use nligems\api\NliSystemApi;
use nligems\api\component\Header;
use nligems\api\page\FrontEndPage;

/**
 * @author Patrick van Bergen
 */
class TimeLinePage extends FrontEndPage
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
        $events = json_decode(file_get_contents(__DIR__ . '/../doc/history.json'), true);

        foreach ($events as $event) {
            $year = $event['year'];
            $content = $event['desc'];

            if (isset($event['links'])) {
                foreach ($event['links'] as $text => $link) {

                    $Link = new HtmlElement('a');
                    $Link->addAttribute('href', $link);
                    $Link->addAttribute('target', '_blank');
                    $Link->addChildText($text);

                    $content .= ' [' . (string)$Link . ']';
                }
            }

            $TimeTable->addEntry($year, $content);
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