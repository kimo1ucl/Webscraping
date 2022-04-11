<?php
# screenshot.php

require 'vendor/autoload.php';


// or
$client = \Symfony\Component\Panther\Client::createChromeClient();

$client
    ->get('https://www.imdb.com/search/name/?birth_monthday=12-10')
    ->takeScreenshot($saveAs = 'screenshot.jpg');
