<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Link
{
    /** @var bool */
    protected $active;

    /** @var  string */
    private $text;

    /** @var  string */
    private $link;

    public function __construct($text, $link, $active)
    {
        $this->text = $text;
        $this->link = $link;
        $this->active = $active;
    }

    public function __toString()
    {
        $Div = new HtmlElement('div');

            $Link = new HtmlElement('a');
            $Link->addAttribute('href', $this->link);

            if ($this->active) {
                $Link->addClass('active');
            }

            $Link->addChildText($this->text);
            $Div->addChildNode($Link);

        return (string)$Div;
    }
}
