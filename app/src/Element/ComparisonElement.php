<?php

namespace Blue\Element;


use Blue\Model\Result;

class ComparisonElement extends AbstractElement {

	public function execute() {
		$this->responses[] = "*** Comparison ***";
		foreach ($this->results->getCompetitorResults() as $competitorResult) {
			/** @var Result $competitorResult */
			$this->responses[] = sprintf(
				"Host compared to %s has difference: %f",
				$competitorResult->getUrl()->getUrl(),
				$this->results->getHostResult()->getTime() - $competitorResult->getTime());
		}
	}

}