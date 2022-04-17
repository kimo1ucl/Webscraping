<?php
use Symfony\Component\DomCrawler\Crawler;

function getSearchCount(Crawler $node)
 {
    $search_count = $node->filter('.srp-results-count');
    $search_count = explode(' ',$search_count->text())[0];
    return $search_count;
 }
 function getPageSize(Crawler $node)
 {
    $node = $node->filter('.custom-select__trigger span');
    print $node->text();
    $page_size = explode(' ',$node->text())[1];
    return $page_size;
 }
function printPage(string $linkurl)
{
   $client = new \Goutte\Client();
   $crawler = $client->request('GET', $linkurl);
   $crawler
   ->filter('.srp-inventory .vehicle-card')
   ->each(function ($card) use ($client){
           // print $card->attr('data-make').PHP_EOL;
            $cardata = printCar($card);
            echo  $cardata.PHP_EOL;
});

}
function printHeader():string{
   (string) $rt = "";
   $rt = 
   '\'data-make\''.';'.
   '\'data-model\''.';'.
   '\'data-year\''.';'.
   '\'data-trim\''.';'.
   '\'data-extcolor\''.';'.
   '\'data-intcolor\''.';'.
   '\'data-trans\''.';'.
   '\'data-price\''.';'.
   '\'data-engine\''.';'.
   '\'data-fueltype\''.';'.
   '\'data-vehicletype\''.';'.
   '\'data-bodystyle\''.';'.
   '\'data-name\''.';'.
   '\'data-vin\''.';'.
   '\'data-modelcode\''.';'.
   '\'data-msrp\''.';'.
   '\'data-stocknum\'';
    ;
   return $rt;  
}
function printCar(Crawler $carnode):string
 {
     (string) $rt = "";
     $rt = 
     '\''.$carnode->attr('data-make').'\''.';'.
     '\''.$carnode->attr('data-model').'\''.';'.
     '\''.$carnode->attr('data-year').'\''.';'.
     '\''.$carnode->attr('data-trim').'\''.';'.
     '\''.$carnode->attr('data-extcolor').'\''.';'.
     '\''.$carnode->attr('data-intcolor').'\''.';'.
     '\''.$carnode->attr('data-trans').'\''.';'.
     '\''.$carnode->attr('data-price').'\''.';'.
     '\''.$carnode->attr('data-engine').'\''.';'.
     '\''.$carnode->attr('data-fueltype').'\''.';'.
     '\''.$carnode->attr('data-vehicletype').'\''.';'.
     '\''.$carnode->attr('data-bodystyle').'\''.';'.
     '\''.$carnode->attr('data-name').'\''.';'.
     //data which looks like keys
     '\''.$carnode->attr('data-vin').'\''.';'.
     '\''.$carnode->attr('data-modelcode').'\''.';'.
     '\''.$carnode->attr('data-msrp').'\''.';'.
     '\''.$carnode->attr('data-stocknum').'\'';
    return $rt;       
}




 
