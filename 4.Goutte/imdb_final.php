<?php
# imdb_final.php

require 'vendor/autoload.php';

$client = new \Goutte\Client();

$client
    ->request('GET', 'https://www.imdb.com/search/name/?birth_monthday=12-10')
    ->filter('.lister-list h3 a')
    ->each(function ($node) use ($client) {
        $name = $node->text();

        $birthday = $client
            ->click($node->link())
            ->filter('#name-born-info > time')->first()
            ->attr('datetime');

        $year = (new DateTimeImmutable($birthday))->format('Y');

        echo "{$name} was born in {$year}\n";
});