<?php

namespace Blue\Service;


use Blue\Model\Url;

class Provider implements ProviderInterface {

	/** @var string */
	protected $hostUrl;
	/** @var array */
	protected $competitorUrls;

	/**
	 * @return Url
	 */
	public function getHostUrl() {
		return ($this->hostUrl instanceof Url)? $this->hostUrl: new Url($this->hostUrl);
	}

	/**
	 * @return Url[]
	 */
	public function getCompetitorUrls() {
		$competitors = [];
		foreach ($this->competitorUrls as $competitor) {
			$competitors[] = ($competitor instanceof Url)? $competitor: new Url($competitor);
		}
		return $competitors;
	}

	/**
	 * @param string $hostUrl
	 */
	public function setHostUrl($hostUrl) {
		$this->hostUrl = $hostUrl;
	}

	/**
	 * @param array $competitorUrls
	 */
	public function setCompetitorUrls(array $competitorUrls) {
		$this->competitorUrls = $competitorUrls;
	}

}