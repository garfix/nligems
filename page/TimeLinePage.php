<?php

namespace nligems\page;

use nligems\page\api\component\HtmlElement;
use nligems\page\api\component\TimeTable;
use nligems\page\api\NliSystemApi;
use nligems\page\api\component\Header;

/**
 * @author Patrick van Bergen
 */
class TimeLinePage extends FrontEndPage
{
    /** @var TimeTable  */
    private $TimeTable;

    protected $title = "Timeline";

    public function __construct(NliSystemApi $NliSystemApi)
    {
        $this->Header = new Header('/timeline', 'Timeline');

        $this->TimeTable = new TimeTable();

        $this->fillTimeTableWithEvents($this->TimeTable);

        $this->addStyleSheet('common');
        $this->addStyleSheet('timeline');
    }

    private function fillTimeTableWithEvents(TimeTable $TimeTable)
    {
        $events = json_decode(file_get_contents(__DIR__ . '/../doc/history.json'), true);

        foreach ($events as $event) {
            $year = $event['year'];
            $id = $event['id'];
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

            $TimeTable->addEntry($year, $id, $content);
        }
    }

    public function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildHtml($this->TimeTable);
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}