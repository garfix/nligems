<?php

namespace nligems\page;

use nligems\api\component\Bullets;
use nligems\api\component\Link;
use nligems\api\LinkApi;
use nligems\api\NliSystemApi;
use nligems\api\page\BackEndPage;

/**
 * @author Patrick van Bergen
 */
class SystemOverviewPage extends BackEndPage
{
    protected function getBody()
    {
        $SystemApi = new NliSystemApi();
        $LinkApi = new LinkApi();

        $systems = $SystemApi->getAllSystems();

        $Bullets = new Bullets();

        foreach ($systems as $System) {

            $id = $System->getId();
            $name = $System->getName();
            $link = $LinkApi->getLink('edit_system', array('id' => $id));
            $Link = new Link($name, $link);

            $Bullets->addItem($Link);

        }

        return (string)$Bullets;
    }
}
