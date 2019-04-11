<?php


namespace Blue\Service;


use Blue\Model\Results;

interface ReporterInterface {

	/**
	 * @param Results $results
	 * @return void
	 */
	public function run(Results $results);

	/**
	 * @return string
	 */
	public function getReport();
}