<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class FormElementTextarea extends HtmlElement
{
    /** @var string  */
    private $value = '';

    public function __construct()
    {
        parent::__construct('textarea');
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
