<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class FormElementCheckbox extends HtmlElement
{
    /** @var string  */
    private $value = '';

    public function __construct()
    {
        parent::__construct('input', false);

        $this->addAttribute('type', 'checkbox');
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
