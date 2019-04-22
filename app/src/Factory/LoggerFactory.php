<?php

namespace Blue\Factory;


use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class LoggerFactory {

	protected static $logPath = __DIR__ . "/../../logs/";

	public static function createAppLogger() {
		$logger = new Logger('app');
		$streamHandler = new RotatingFileHandler(self::$logPath . 'app.log', 0, Logger::DEBUG);
		$streamHandler->setFilenameFormat('{filename}-{date}', RotatingFileHandler::FILE_PER_DAY);
		$logger->setHandlers([$streamHandler]);
		return $logger;
	}

	public static function createErrorLogger() {
		$logger = new Logger('error');
		$streamHandler = new RotatingFileHandler(self::$logPath . 'error.log', 0, Logger::DEBUG);
		$streamHandler->setFilenameFormat('{filename}-{date}', RotatingFileHandler::FILE_PER_DAY);
		$logger->setHandlers([$streamHandler]);
		return $logger;
	}

}