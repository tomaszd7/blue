<?php

namespace Blue;

use Blue\Model\Result;
use Blue\Model\Results;
use Blue\Model\Url;
use Blue\Service\CallerInterface;
use Blue\Service\ProviderInterface;
use Blue\Service\ReporterInterface;
use Psr\Log\LoggerInterface;
use Webmozart\Assert\Assert;

class App {

	/** @var ProviderInterface */
	protected $provider;
	/** @var CallerInterface */
	protected $caller;
	/** @var ReporterInterface */
	protected $reporter;
	protected $config;
	/** @var LoggerInterface */
	protected $logger;

	/** @var Results */
	protected $results;
	/** @var string */
	protected $report;

	/**
	 * App constructor.
	 * @param CallerInterface   $caller
	 * @param ReporterInterface $reporter
	 * @param LoggerInterface   $logger
	 */
	public function __construct(CallerInterface $caller, ReporterInterface $reporter, LoggerInterface $logger) {
		$this->caller   = $caller;
		$this->reporter = $reporter;
//		$this->config   = $config;
		$this->logger = $logger;

		$this->reporter->setLogger($this->logger);
		$this->results = new Results();
	}


	public function run() {
		$this->logger->info('*** APP START ***');
		try {
			Assert::notNull($this->provider, "Set provider first before running app");
			$this->runHost();
			$this->runCompetitors();
			$this->report = $this->makeReport();
		} catch (\Exception $e) {
			$this->logger->critical($e->getMessage());
			$this->report .= "\n" . $e->getMessage();
		}
		$this->logger->info('*** APP END ***');
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
			try {
				/** @var Url $competitorUrl */
				$this->caller->call($competitorUrl);
				$result = new Result();
				$result->setUrl($competitorUrl);
				$result->setTime($this->caller->getTime());
				$this->results->addCompetitorResult($result);
			} catch (\Exception $e) {
				$this->logger->error("Error calling for competitor: " . $competitorUrl->getUrl() . ". " . $e->getMessage());
			}
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

	/**
	 * @return string
	 */
	public function getReport() {
		return $this->report;
	}


}