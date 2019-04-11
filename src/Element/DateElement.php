<?php

namespace Blue\Element;


class DateElement extends AbstractElement {

	/**
	 * @throws \Exception
	 */
	public function execute() {
		$this->responses[] = "Report Date: " . (new \DateTime())->format('Y-m-d');
	}

}