<?php

/*
 *  This is a example of your custom assets init file
 */

// To start customizing you need to create init.php file around this file

// You can create and connect custom CSS file like this:
$doc->addStyleSheet($path['template'] . '/assets/custom.css');

// You can create and connect custom JS file like this:
$doc->addScript($path['template'] . '/assets/custom.js');

// Or you can just write php code right here