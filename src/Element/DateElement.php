<?php

namespace Blue\Element;


class DateElement extends AbstractElement {

	/**
	 * @return bool
	 */
	public function isSatisfiedBy() {
		return true;
	}

	/**
	 * @throws \Exception
	 */
	public function execute() {
		$this->responses[] = "Report Date: " . (new \DateTime())->format('Y-m-d');
	}

}