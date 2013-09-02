<?php
require_once "phpnl.inc.php";
require_once "langBase.inc.php";
require_once "enLang.inc.php";
// require any other language extensions here

// We want to get the value of miles
$config = array("miles");

// The string we want to analyze
$string = "He ran 10 miles today";

// create the new English language analyzer
$search = phpNL::newLanguage("en");

// Set some properties
$search->setSearchString($string);
$search->setMode("attribute");
$search->setSearchFields($config);

// Return the result of the analyzer
var_dump( $search->run() );