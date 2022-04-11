<?php
# goutte_xpath.php

require 'vendor/autoload.php';

$client = new \Goutte\Client();

$crawler = $client->request('GET', 'https://www.imdb.com/search/name/?birth_monthday=12-10');

$links = $crawler->evaluate('//div[@class="lister-list"][1]//h3/a');

foreach ($links as $link) {
    echo $link->textContent.PHP_EOL;
}