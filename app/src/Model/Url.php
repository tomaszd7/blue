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
            if (!filter_var($this->url, FILTER_VALIDATE_URL)) {
                throw new \Exception("Invalid url for value {$this->url}. Enter full url with protocol.");
            }
	}
}