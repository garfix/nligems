<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\component\TimeTable;
use nligems\api\Features;
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
        $this->Header = new Header('timeline.php', 'Timeline');

        $this->TimeTable = new TimeTable();

        $this->fillTimeTableWithSystems($this->TimeTable);
        $this->fillTimeTableWithEvents($this->TimeTable);

        $this->addStyleSheet('common');
        $this->addStyleSheet('timeline');
    }

    private function fillTimeTableWithSystems(TimeTable $TimeTable)
    {
        $NliSystemApi = new NliSystemApi();

        $events = json_decode(file_get_contents(__DIR__ . '/../doc/history.json'), true);

        foreach ($NliSystemApi->getAllSystems() as $System) {

            $content = 'Start of ' . $System->getName() . '.';

            $dependencies = array();
            foreach ($events as $dependencyEvent) {
                if (isset($dependencyEvent['dependencyOf']) && in_array($System->getId(), $dependencyEvent['dependencyOf'])) {
                    $dependencies []= "<i>" . $dependencyEvent['id'] . "</i> (" . $dependencyEvent['year'] . ')';
                }
            }

            if ($dependencies) {
                $content .= " Main influences: " . implode(', ', $dependencies);
            }

            $TimeTable->addEntry($System->get(Features::FIRST_YEAR), $content);

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
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildHtml($this->TimeTable);
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}