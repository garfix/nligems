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
            $html =  file_get_contents($file);
        } else {

            $html = "
                <h2>Interview &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </h2>
                <a href='/interview/chat-80'>
                    <h3>Interview with David Warren and Fernando Pereira / Chat-80</h3>
                </a>";

        }

        return "<div class='content'>" . $html . "</div>";
    }
}