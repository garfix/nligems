<?php
/**
 * Helper page that allows you to give all systems default values for newly defined features.
 */

use nligems\api\NliSystemApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();

foreach ($NliSystemApi->getAllSystems() as $System) {
    $NliSystemApi->saveSystem($System);
}

