<?php

namespace nligems\api\filter;

/**
 * @author Patrick van Bergen
 */
class CheckboxHeader extends Component
{
    /** @var  string */
    private $header;

    public function __construct($header)
    {
        $this->header = $header;
    }

    public function __toString()
    {
        return "<h3>" . htmlentities($this->header) . "</h3>";
    }
}
