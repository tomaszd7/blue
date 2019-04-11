<?php
namespace Blue\Service;

use Blue\Model\Url;

interface ProviderInterface {

	/**
	 * @return Url
	 */
	public function getHostUrl();

	/**
	 * @return Url[]
	 */
	public function getCompetitorUrls();
}