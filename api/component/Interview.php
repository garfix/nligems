<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Interview extends HtmlElement
{
    public function __toString()
    {
        return file_get_contents(__DIR__ . '/../../doc/interview.html');
    }
}