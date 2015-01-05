<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class SubmitButton extends HtmlElement
{
    public function __construct($text)
    {
        parent::__construct('button');

        $this->addAttribute('type', 'submit');
        $this->addChildText($text);
    }
}
