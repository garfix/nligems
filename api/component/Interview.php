<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class Interview extends HtmlElement
{
    protected $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public function __toString()
    {
        $file = __DIR__ . '/../../doc/interview/' . $this->subject . '.html';
        if ($this->subject && file_exists($file)) {
            return file_get_contents($file);
        } else {

            $html = "<h2>Interview</h2>
            <h3><a href='interview.php?subject=chat-80'>Interview with David Warren and Fernando Pereira / Chat-80</a></h3";

            return $html;
        }
    }
}