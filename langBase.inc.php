<?php

interface nlInterface {
	function stem($word);
	function setSearchString($str);
	function setMode($mode);
	function setProperties($prop_array);
	function run();
}

abstract class phpnlLangBase implements nlInterface{
	
	// The full string the class will analyze
	protected $nl_string = null;
	
	// Array of instructions for the analyzer
	protected $properties = array();
	
	// By what mode thhe analyzer should interpret patterns in the string.
	protected $mode = "attribute";
	/* Possible values:
	"attribute" find the values of the items as defined in the properties.
		ex: "He ran 10 miles", would return an array like the following (if "miles" was provided):
		{
			"miles" => "10"
		}
	
	"subject" finds the specific elements in the string.
		ex: "He ran 10 miles" would return an array like the following:
		{
			"who" => "He",
			"what" => "ran",
			"distance" => {
							"measurement" => "miles",
							"value" => "10"
							}
		}
	*/
	
	public function setSearchString($str) {
		$this->nl_string = $str;
	}
	
	public function setMode($mode) {
		if (!method_exists($this,"run_".$mode)) {
			throw new Exception("[phpNL]: Unknown mode passed to ->setMode()");
		}
	}
	
	public function setSearchFields($prop_array) {
		if (is_array($prop_array) && count($prop_array) > 0) {
			$this->properties = $prop_array;
		} else {
			throw new Exception("[phpNL]: ->setSearchFields() requires an array with an least 1 element.");
		}
	}
	
	protected function run_attribute() {
		$run_return = array();
		foreach ($this->properties as $prop) {
			$prop_stem = $this->stem($prop);
			$attr_search_pattern = "/\d+(?= ($prop|$prop_stem))/";
			preg_match_all($attr_search_pattern, $this->nl_string, $matches);
			$prop_arr = array("stem" => $prop_stem,
							  "value" => $matches[0][0]);
			$run_return[$prop] = $prop_arr;
		}
		return $run_return;
	}
	
	protected function run_subject() {
		// TODO!
	}
	
	public function run() {
		if (count($this->properties) == 0 || is_null($this->nl_string)) {
			throw new Exception("[phpNL]: Invalid setup. Please call ->setString() and ->setProperties()");
		}
		
		$mode = "run_".$this->mode;
		return $this->$mode();
	}
}