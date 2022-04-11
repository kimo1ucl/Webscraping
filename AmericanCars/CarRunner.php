<?php
# imdb_final.php

use Symfony\Component\DomCrawler\Crawler;
require 'vendor/autoload.php';
require_once 'CarHelper.php';

//Create outfile and add header
$filename = '.AmericanCars.csv';
file_put_contents($filename, printHeader().PHP_EOL, FILE_APPEND);

//Offline crawling
$client = new \Goutte\Client();
$crawler = $client->request('GET', 'https://www.allamericanfordinoldbridge.com/searchused.aspx');
(int) $searchcount = intval(getSearchCount($crawler));
(int) $pagesize = 24;
(int) $pages = ceil($searchcount / $pagesize);
for ($i=1;$i<=$pages;$i++){
    $linkurl = 'https://www.allamericanfordinoldbridge.com/searchused.aspx?pt='.$i;

    $crawler = $client->request('GET',$linkurl);
    $crawler
        ->filter('.srp-inventory .vehicle-card')
        ->each(function ($card) use ($crawler){
                // print $card->attr('data-make').PHP_EOL;
                 $cardata = printCar($card);
                 echo  $cardata.PHP_EOL;
                 $filename = '.AmericanCars.csv';
                 file_put_contents($filename, $cardata.PHP_EOL, FILE_APPEND);
    });   
}
//complete the outfile
$timestamp   = date('Ymd_His');
rename(".AmericanCars.csv", $timestamp."_AmericanCars.csv");
