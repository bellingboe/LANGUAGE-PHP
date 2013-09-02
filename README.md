PHP-NL
======

PHP-NL is a work-in-progress natural language library for possible natural-language search.

Purpose / Features
=====

The full purpose and scope has yet to be clearly defined but right now it does the following:
 - Gets the base stem (singular) of any English word. Ex: "communities" => "community" (Porter Stemming Algorithm)
 - Return the numerical value of any "object" supplied in ```->setSearchFields()``` (Attribute mode)

Example
=====
```php
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

/*
result:

array(4) {
  ["miles"]=>
  array(2) {
    ["stem"]=>
    string(4) "mile"
    ["value"]=>
    string(2) "10"
  }
  ["action"]=>
  array(1) {
    ["value"]=>
    string(3) "ran"
  }
  ["when"]=>
  array(1) {
    ["value"]=>
    string(5) "today"
  }
  ["who"]=>
  array(1) {
    ["value"]=>
    string(2) "He"
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
  - Allow the retrieval of the who, what, where, when, etc of any given sentence.

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
