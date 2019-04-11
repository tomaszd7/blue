<?php

namespace Blue\Element;


class HostElement extends AbstractElement {

	/**
	 * @return bool
	 */
	public function isSatisfiedBy() {
		return true;
	}

	/**
	 * @return string|array
	 * @throws \Exception
	 */
	public function execute() {
		$this->responses[] = "*** Loading times ***";
		$this->responses[] = sprintf(
			"Host url %s time: %s",
			$this->results->getHostResult()->getUrl()->getUrl(),
			$this->results->getHostResult()->getTime());
	}

}