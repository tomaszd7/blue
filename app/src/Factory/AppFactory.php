<?php
namespace Blue\Factory;

use Blue\App;
use Blue\Element\ComparisonElement;
use Blue\Element\CompetitorsElement;
use Blue\Element\DateElement;
use Blue\Element\HostElement;
use Blue\Service\Caller;
use Blue\Service\Reporter;
use GuzzleHttp\Client;

class AppFactory {

	public static function create() {

		$caller = new Caller(new Client());

		$reporter = new Reporter([
			new DateElement(),
			new HostElement(),
			new CompetitorsElement(),
			new ComparisonElement()
		]);

		return new App(
			$caller,
			$reporter,
			LoggerFactory::createAppLogger()
		);

	}
}