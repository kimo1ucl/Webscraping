<?php
# goutte_css.php

require 'vendor/autoload.php';

$client = new \Goutte\Client();

$crawler = $client->request('GET', 'https://www.imdb.com/search/name/?birth_monthday=12-10');

$crawler->filter('.lister-list h3 a')->each(function ($node) {
    echo $node->text().PHP_EOL;
});