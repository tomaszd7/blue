<?php

namespace Blue\Element;


use Blue\Model\Results;

abstract class AbstractElement implements ElementInterface {

	/** @var Results */
	protected $results;

	/** @var array */
	protected $responses;

	public function __construct() {
		$this->responses = [];
	}

	/**
	 * @param Results $results
	 */
	public function setResults(Results $results) {
		$this->results = $results;
	}

	/**
	 * @return array
	 */
	public function getResponse() {
		return $this->responses;
	}


}