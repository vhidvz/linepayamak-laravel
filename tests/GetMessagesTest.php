<?php

require __DIR__ . '/../vendor/autoload.php';

use LinePayamak\Support\Service;

$config = require __DIR__ . '/../src/config/linepayamak.php';
$sms = new Service($config);

var_dump($sms->GetMessages());
