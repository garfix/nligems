<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class ImageBar
{
    /** @var Image[] */
    private $images = [];

    public function addImage($text, $image)
    {
        $this->images[] = new Image($text, $image);
    }

    public function __toString()
    {
        $Bar = new HtmlElement('div');
        $Bar->addClass('imageBar');

        foreach ($this->images as $Image) {
            $Bar->addChildHtml((string)$Image);
        }

        return (string)$Bar;
    }
}
