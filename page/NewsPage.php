<?php

namespace nligems\page;

use nligems\api\component\HtmlElement;
use nligems\api\component\Header;
use nligems\api\component\News;

/**
 * @author Patrick van Bergen
 */
class NewsPage extends FrontEndPage
{
    /** @var News  */
    private $News;

    protected $title = "News";

    public function __construct()
   	{
        $this->Header = new Header('news.php', 'Website news');

        $news = json_decode(file_get_contents(__DIR__ . '/../doc/news.json'), true);
        $this->News = new News($news);

        $this->addStyleSheet('common');
        $this->addStyleSheet('news');
   	}

    protected function getBody()
    {
        $Page = new HtmlElement('div');
        $Page->addClass('page');

        $Header = new HtmlElement('div');
        $Header->addChildHtml((string)$this->Header);
        $Page->addChildNode($Header);

        $Body = new HtmlElement('div');
        $Body->addClass('textPage');
        $Body->addChildNode($this->News);
        $Page->addChildNode($Body);

        return (string)$Page;
    }
}
