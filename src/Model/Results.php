<?php

namespace Blue\Model;


class Results {

	/** @var Result */
	protected $hostResult;
	/** @var Result[] */
	protected $competitorResults;

	/**
	 * @return Result
	 */
	public function getHostResult() {
		return $this->hostResult;
	}

	/**
	 * @param Result $hostResult
	 */
	public function setHostResult(Result $hostResult) {
		$this->hostResult = $hostResult;
	}

	/**
	 * @return Result[]
	 */
	public function getCompetitorResults() {
		return $this->competitorResults;
	}

	public function addCompetitorResult(Result $competitorResult) {
		$this->competitorResults[] = $competitorResult;
	}

}