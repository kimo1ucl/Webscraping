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
$crawler = new Crawler(file_get_contents('Pre-Owned Ford Sales near Monroe Township, NJ _ Used Ford Dealer.htm'));

$crawler
    ->filter('.srp-inventory .vehicle-card')
    ->each(function ($card) use ($crawler){
            
        $cardata = printCar($card);
        echo  $cardata.PHP_EOL;
        $filename = '.AmericanCars.csv';
        file_put_contents($filename, $cardata.PHP_EOL, FILE_APPEND);
});

//complete the outfile
$timestamp   = date('Ymd_His');
rename(".AmericanCars.csv", $timestamp."_AmericanCars.csv");
