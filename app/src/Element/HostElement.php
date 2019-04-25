<?php

namespace Blue\Element;

use Blue\Config;

class HostElement extends AbstractElement {

	/**
	 * @return string|array
	 * @throws \Exception
	 */
	public function execute() {
		$this->responses[] = "*** Loading times ***";
		$this->responses[] = sprintf(
			"Host url %s time: %s",
			$this->results->getHostResult()->getUrl()->getUrl(),
                        Config::formatTime($this->results->getHostResult()->getTime()));
	}

}