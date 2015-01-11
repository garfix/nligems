<?php

use nligems\api\NliSystemApi;

require __DIR__ . '/autoload.php';

$NliSystemApi = new NliSystemApi();

foreach ($NliSystemApi->getAllSystems() as $System) {
    $NliSystemApi->saveSystem($System);
}

