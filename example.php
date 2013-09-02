<?php
ini_set("display_errors","On");
error_reporting(E_ALL);

require_once "phpnl.inc.php";
require_once "langBase.inc.php";
require_once "enLang.inc.php";
// require any other language extensions here

// ->setSearchFields() takes an array of attributes to look up in the phrase.
// You can supply the singular value or plural. It will match both.
$config = array("miles"); // "miles" will also match "mile"

// You can also look for a value with no inherent
// attribute by specifying 1 or more options to match.
$config[] = array("action" => "ran|jumped|skipped|hopped");
$config[] = array("when" => "today|tomorrow|yesterday");
$config[] = array("who" => "he|she");

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