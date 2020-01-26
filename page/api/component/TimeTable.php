<?php

namespace nligems\page\api\component;

/**
 * @author Patrick van Bergen
 */
class TimeTable
{
    private $entries = array();

    public function addEntry($year, $id, $contents)
    {
        $this->entries[$year][$id] = $contents;
    }

    public function __toString()
    {
        $entries = $this->entries;
        ksort($entries);

        $YearList = new HtmlElement('ul');
        $YearList->addClass('yearList');

        foreach ($entries as $year => $entriesPerYear) {

            $ids = [];
            foreach ($entriesPerYear as $id => $entry) {
                $ids[] = $id;
            }

            $YearItem = new HtmlElement('li');
            $YearList->addChildNode($YearItem);

            $Year = new HtmlElement('h2');
            $Year->addChildText($year. ": "  . implode(', ', $ids));
            $YearItem->addChildNode($Year);

            $EntryList = new HtmlElement('ul');
            $YearItem->addChildNode($EntryList);

            foreach ($entriesPerYear as $entry) {

                $Entry = new HtmlElement('li');
                $Entry->addChildHtml($entry);
                $EntryList->addChildNode($Entry);
            }
        }

        return (string)$YearList;
    }
}
