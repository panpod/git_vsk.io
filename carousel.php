<?php
$carouselFactory = new CarouselFactory();

// Load items from INI file
$iniFilePath = 'ini/carousel.ini'; // Update this path as needed
$carouselFactory->loadFromIniFile($iniFilePath);

// Output the carousel HTML
echo $carouselFactory->render();