<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class FormElementText extends HtmlElement
{
    /** @var string  */
    private $value = '';

    public function __construct()
    {
        parent::__construct('input');

        $this->addAttribute('type', 'text');
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
