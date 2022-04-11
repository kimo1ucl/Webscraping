For different PHP scraping commands and frameworks see:
https://www.scrapingbee.com/blog/web-scraping-php/

The examples in the webarticle are prepared for you to try out in the folders named:
1.1with-fsoc
1.2.with-curl
2.file_get_contents
3.Guzzle
4.Goutte
5.Headless-Panther

Downloading frameworks:
=======================
These implementations are dependent of frameworks
3.Guzzle
4.Goutte
5.Headless-Panther
To see the code in action you need to install the proper framwork using "composer", 
a PHP specific package linker and updater tool. See how here:
https://getcomposer.org/download/

After having intalled composer (which will install files in your OS)
you can run commands like:
composer require fabpot/goutte
composer require masterminds/html5
When you run these command in the folder where your code lives, 2 files are created:
composer.json
composer.lock
The content of these files persists the result of your commands.
Furthermore a folder named 'vendor' is also created. This is the codefiles
of the framework you have downloaded and all the dependencies which applies this exact 
(part of the) framework.
in each folder with dependencies you will find a composer.ps1 file. This file contains 
compose commands to download and install the necessary frameworks.

The AmericanCars folders 
========================
https://www.allamericanfordinoldbridge.com/searchused.aspx
AmericanCars
AmericanCarsOffline
uses "fabpot/goutte": "^4.0", and "masterminds/html5": "^2.7".
The offline folder does not make live requests but reads a static copy of the homepage:
'Pre-Owned Ford Sales near Monroe Township, NJ _ Used Ford Dealer.html'
