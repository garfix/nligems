<?php

ini_set('display_errors', 1);

function __autoload($class)
{
    require_once __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
}
