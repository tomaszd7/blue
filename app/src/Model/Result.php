<?php

namespace Blue\Model;


class Result {

	/** @var Url */
	protected $url;
	/** @var float */
	protected $time;

	/**
	 * @return Url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param Url $url
	 */
	public function setUrl(Url $url) {
		$this->url = $url;
	}

	/**
	 * @return float
	 */
	public function getTime() {
		return $this->time;
	}

	/**
	 * @param float $time
	 */
	public function setTime($time) {
		$this->time = (float)$time;
	}


}