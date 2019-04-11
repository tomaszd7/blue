<?php
namespace Blue\Model;

class Url {

	/** @var string */
	protected $url;

	public function __construct($url) {
		$this->url = $url;
		$this->validate();
	}

	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	protected function validate() {

	}
}