<?php
# imdb.php

require 'vendor/autoload.php';

$httpClient = new \GuzzleHttp\Client();

$response = $httpClient->get('https://www.imdb.com/search/name/?birth_monthday=12-10');

$htmlString = (string) $response->getBody();

// HTML is often wonky, this suppresses a lot of warnings
libxml_use_internal_errors(true);

$doc = new DOMDocument();
$doc->loadHTML($htmlString);

$xpath = new DOMXPath($doc);

$links = $xpath->evaluate('//div[@class="lister-list"][1]//h3/a');

foreach ($links as $link) {
    echo $link->textContent.PHP_EOL;
}
echo "script ends";