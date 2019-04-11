<?php

namespace Blue\Service;


use Blue\Model\Url;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\TransferStats;

class Caller implements CallerInterface {

	/** @var Client */
	protected $client;

	/** @var Response */
	protected $response;

	/** @var TransferStats */
	protected $stats;

	public function __construct(Client $client) {
		$this->client = $client;
	}

	/**
	 * @param Url $url
	 */
	public function call(Url $url) {
		$this->clear();
		$this->response = $this->client->get($url->getUrl(), [
			'on_stats' => function(TransferStats $stats) {
				$this->stats = $stats;
			}
		]);
	}

	/**
	 * @return float
	 */
	public function getTime() {
		return $this->stats->getTransferTime();
	}

	protected function clear() {
		// just in case but can be a better way here
		$this->response = null;
		$this->stats = null;
	}

}