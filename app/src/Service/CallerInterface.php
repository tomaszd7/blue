<?php

namespace Blue\Service;


use Blue\Model\Url;

interface CallerInterface {

	public function call(Url $url);

	/**
	 * @return float
	 */
	public function getTime();

}