<?php

namespace Blue;

use Blue\Model\Result;
use Blue\Model\Results;
use Blue\Model\Url;
use Blue\Service\CallerInterface;
use Blue\Service\ProviderInterface;
use Blue\Service\ReporterInterface;
use Webmozart\Assert\Assert;

class App {

	/** @var ProviderInterface */
	protected $provider;
	/** @var CallerInterface */
	protected $caller;
	protected $reporter;
	protected $config;
	protected $logger;


	/** @var Results */
	protected $results;

	/**
	 * App constructor.
	 * @param CallerInterface   $caller
	 * @param ReporterInterface $reporter
	 */
	public function __construct(CallerInterface $caller, ReporterInterface $reporter) {
		$this->caller   = $caller;
		$this->reporter = $reporter;
//		$this->config   = $config;
//		$this->logger   = $logger;

		$this->results = new Results();
	}


	public function run() {
		dump('in run');
		Assert::notNull($this->provider, "Set provider first before running app");
		$this->runHost();
		$this->runCompetitors();
		dump($this->results);
		$report = $this->makeReport();
		dump($report);
	}

	protected function runHost() {
		$this->caller->call($this->provider->getHostUrl());
		$result = new Result();
		$result->setUrl($this->provider->getHostUrl());
		$result->setTime($this->caller->getTime());
		$this->results->setHostResult($result);
	}

	protected function runCompetitors() {
		foreach ($this->provider->getCompetitorUrls() as $competitorUrl) {
			/** @var Url $competitorUrl */
			$this->caller->call($competitorUrl);
			$result = new Result();
			$result->setUrl($competitorUrl);
			$result->setTime($this->caller->getTime());
			$this->results->addCompetitorResult($result);
		}
	}

	/**
	 * @return string
	 */
	protected function makeReport() {
		$this->reporter->run($this->results);
		return $this->reporter->getReport();
	}

	/**
	 * @param ProviderInterface $provider
	 */
	public function setProvider(ProviderInterface $provider) {
		$this->provider = $provider;
	}


}