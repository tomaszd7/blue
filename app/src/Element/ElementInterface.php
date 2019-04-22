<?php
namespace Blue\Element;

use Blue\Model\Results;

interface ElementInterface {

	/**
	 * @return boolean
	 */
	public function isSatisfiedBy();

	/**
	 * @return void
	 */
	public function execute();

	/**
	 * @return array
	 */
	public function getResponse();

	/**
	 * @param Results $results
	 * @return void
	 */
	public function setResults(Results $results);
}