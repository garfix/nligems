<?php

namespace nligems\page;

use nligems\page\api\component\HtmlElement;
use nligems\page\api\component\Header;
use nligems\page\api\component\AllSystems;
use nligems\page\api\component\ParseDown;
use nligems\page\api\component\TitleParser;

/**
 * @author Patrick van Bergen
 */
class SystemsPage extends FrontEndPage
{
    protected $allSystems;

    protected $title = "Systems";

    public function __construct()
   	{
        $this->Header = new Header('/all-systems', 'Systems');

        $this->addStyleSheet('common');
        $this->addStyleSheet('all-systems');
        $this->addStyleSheet('toc');

        $this->allSystems = $this->getAllSystems();
   	}

   	protected function getAllSystems()
    {
        $systems = [];
        $parseDown = new ParseDown();

        foreach (glob(__DIR__ . '/../data/*.json') as $jsonFile) {
            $mdFile = str_replace('.json', '.md', $jsonFile);
            $data = json_decode(file_get_contents($jsonFile), true);
            if (file_exists($mdFile)) {
                $data['LONG_DESC'] = $this->addGems($parseDown->parse(file_get_contents($mdFile)));
            }
            preg_match('|([^./]+).json|', $jsonFile, $matches);
            $data['ID'] = $matches[1];
            $systems[] = $data;
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

    protected function addGems($text)
    {
        return str_replace('<li>!', '<li class="gem">', $text);
    }

    protected function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $AllSystems = new AllSystems($this->allSystems);
        $html = (string)$AllSystems;

        $indexParser = new TitleParser();
        $tocHtml = $indexParser->createTocHtml($html);

        $content = "<div class='content'>" . $html . "</div>";

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildHtml($tocHtml);
        $Body->addChildHtml($content);
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}
