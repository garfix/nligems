<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Legend extends HtmlElement
{
    public function __construct($text)
    {
        parent::__construct('legend');

        $this->addChildText($text);
    }
}
