<?php

namespace Blue\Element;


use Blue\Model\Result;

class CompetitorsElement extends AbstractElement {

	/**
	 * @return string|array
	 * @throws \Exception
	 */
	public function execute() {
		foreach ($this->results->getCompetitorResults() as $competitorResult) {
			/** @var Result $competitorResult */
			$this->responses[] = sprintf(
				"Competitor url %s time: %s",
				$competitorResult->getUrl()->getUrl(),
				$competitorResult->getTime());
		}
	}

}