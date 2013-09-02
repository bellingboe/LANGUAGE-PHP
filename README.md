PHP-NL
======

PHP-NL is a work-in-progress natural language library for possible natural-langauge search.

Purpose / Features
=====

The full purpose and scope has yet to be cleary defined but right now it does the following:
 - Gets the base stem (singlar) of any English word. Ex: "communities" => "community" (Porter Stemming Algorithm)
 - Return the numerical value of any "object" supplied in ```->setProperties()``` (Attribute mode)

Example
=====
```php
require_once "phpnl.inc.php";
require_once "langBase.inc.php";
require_once "enLang.inc.php";
// require any other language extensions here

// We want to get the value of miles
$config = array("miles");

// The string we want to analyze
$string = "He ran 10 miles today";

// Create the new English language analyzer
$search = phpNL::newLanguage("en");

// Set some properties
$search->setSearchString($string);
$search->setMode("attribute");
$search->setProperties($config);

// Return the result of the analyzer
var_dump( $search->run() );

/*
result:
array(1) {
  ["miles"]=>
  array(2) {
    ["stem"]=>
    string(4) "mile"
    ["value"]=>
    string(2) "10"
  }
}
*/
```

Todo
=====

 - Define a strict set of rules for language extensions.
 - Language detecting at a future date to remove the need to manually require the language files.
 - Improvements to Attribute mode:
  - Allow the matching of true natural writing by accepting the written out number vales. ("ten miles" vs "10 miles")
 - Improvements to Subject mode:
  - Needs to be implemented.
  - Allow the retreieval of the who, what, where, when, etc of any given sentence.

Authors
=====

Brenden Ellingboe

Credits
=====

(c) 2013 URentWise, LLC

PHP-NL makes use of the Porter Stemming Algorithm.
 - Written by Iain Argent for Complinet Ltd., 17/2/00
 - Translated from the PERL version at http://www.muscat.com/~martin/p.txt
 - Version 1.1 (Includes British English endings)
