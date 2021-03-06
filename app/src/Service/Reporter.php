<?php


namespace Blue\Service;


use Blue\Element\AbstractElement;
use Blue\Element\ElementInterface;
use Blue\Model\Results;
use Psr\Log\LoggerInterface;

class Reporter implements ReporterInterface {

	/** @var array */
	protected $elements;

	/** @var array */
	protected $reportRows;

	/** @var LoggerInterface */
	protected $logger;

	/**
	 * Reporter constructor.
	 * @param array $elements
	 */
	public function __construct(array $elements) {
		$this->reportRows = [];
		$this->elements   = array_filter($elements, function ($element) {
			if ($element instanceof AbstractElement) {
				return true;
			}
			// log error
			return false;
		});
	}

	public function run(Results $results) {
		/** @var ElementInterface $element */
		foreach ($this->elements as $element) {
			$element->setResults($results);
			$element->execute();
			$this->reportRows = array_merge($this->reportRows, $element->getResponse());
			// add logging
			array_map(function ($responseRow) {
				$this->logger->info($responseRow);
			}, $element->getResponse());
		}
	}

	public function getReport() {
		return implode("\n", $this->reportRows);
	}

	/**
	 * @param LoggerInterface $logger
	 */
	public function setLogger($logger) {
		$this->logger = $logger;
	}

}