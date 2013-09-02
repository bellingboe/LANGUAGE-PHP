PHP-NL
======

PHP-NL is a work-in-progress natural language library for possible natural-langauge search.

Purpose / Features
=====

The full purpose and scope has yet to be cleary defined but right now it does the following:
 - Gets the base stem (singlar) of any English word. Ex: "communities" => "community" (Porter Stemming Algorithm)

Todo
=====

 - Define a strict set of rules for language extensions.
 - Create convenience methods. (get word type: noun, verb, etc;)

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