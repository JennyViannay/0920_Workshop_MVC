<?php

require __DIR__.'/../config.php';
require __DIR__.'/../src/routing.php';

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
