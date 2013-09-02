<?php

class phpNL {
	
	public function __construct() {
		throw new Exception("[phpNL]: Cannot create a new instance of the phpNL class explicitly. Use ::newLanguage(\$lang) instead.");
	}
	
	public static function newLanguage($lang = "en") {
		$lang_class = $lang."Lang";
		if (class_exists($lang_class)) {
			return new $lang_class();
		} else {
			throw new Exception("[phpNL]: Language class {$lang_class} not found. The language '$lang' may not be supported yet.");
		}
	}

}
