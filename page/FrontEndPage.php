<?php

namespace nligems\page;

use nligems\api\component\Header;

/**
 * @author Patrick van Bergen
 */
abstract class FrontEndPage
{
    /** @var string  */
    protected $template = 'nligems';

    protected $title = "NLI Gems";

    /** @var  Header */
    protected $Header;

    /** @var array[]  */
    protected $styleSheets = array();

    /** @var array[]  */
    protected $scripts = array();

    public function __toString()
    {
        $body = $this->getBody();

        return str_replace(array(
            '##title##',
            '##body##',
            '##styles##',
            '##scripts##',
        ), array(
            $this->title,
            $body,
            $this->getStyles(),
            $this->getScripts(),
        ),
            $this->getTemplate());
    }

    public function addStyleSheet($styleSheet)
    {
        $this->styleSheets[] = $styleSheet;
    }

    private function getStyles()
    {
        $styleHtml = '';

        foreach ($this->styleSheets as $styleSheet) {
            $styleHtml .= "<link rel='stylesheet' type='text/css' href='/page/css/" . $styleSheet . ".css' />\n";
        }

        return $styleHtml;
    }


    private function getScripts()
    {
        $scriptHtml = '';

        foreach ($this->scripts as $script) {
            $scriptHtml .= "<script src='page/script/" . $script. ".js'></script>\n";
        }

        return $scriptHtml;
    }

    private function getTemplate()
    {
        return file_get_contents(__DIR__ . '/' . $this->template . '.html');
    }

    protected abstract function getBody();
}
