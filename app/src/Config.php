<?php

namespace Blue;

/**
 * Description of Config
 *
 * @author tomasz
 */
class Config {
    
    const DEFAULT_DECIMAL = 2;

    public static function formatTime($time) {
        return number_format($time, self::DEFAULT_DECIMAL);
    }
}
