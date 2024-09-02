<?php

/**
 * Copyright (c) D3 Data Development (Inh. Thomas Dartsch)
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <info@shopmodule.com>
 * @link      https://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Log;

use InvalidArgumentException;
use Psr\Log\LogLevel;

class d3LogLevel extends LogLevel
{
    // single log levels
    public const EMERGENCY = 0;                // 1
    public const ALERT = 1;                    // 2
    public const CRITICAL = 2;                 // 4
    public const ERROR = 3;                    // 8
    public const WARNING = 4;                  // 16
    public const NOTICE = 5;                   // 32
    public const INFO = 6;                     // 64
    public const DEBUG = 7;                    // 128
    public const TEST = 8;                     // 256
    public const LOGLEVEL_9 = 9;               // 512  // not used
    public const LOGLEVEL_10 = 10;             // 1024 // not used
    public const LOGLEVEL_11 = 11;             // 2048 // not used
    public const NONE = 12;                    // 4096

    // grouped log levels
    public const ERROR_GROUP = 0 |
        1 << self::EMERGENCY |
        1 << self::ALERT |
        1 << self::CRITICAL |
        1 << self::ERROR;               // 15

    public const WARNING_GROUP = 0 |
        1 << self::WARNING;             // 16

    public const NOTICE_GROUP = 0 |
        1 << self::NOTICE;              // 32

    public const INFO_GROUP = 0 |
        1 << self::INFO;                // 64

    public const DEV_GROUP = 0 |
        1 << self::DEBUG |
        1 << self::TEST;                // 384

    public const EMPTY_GROUP = 0 |
        1 << self::LOGLEVEL_9 |
        1 << self::LOGLEVEL_10 |
        1 << self::LOGLEVEL_11;         // 3584

    public const NONE_GROUP = 0 |
        1 << self::NONE;                // 4096

    // ranged log levels
    public const ERROR_AND_ABOVE = 0 |
        self::ERROR_GROUP;              // 15

    public const WARNING_AND_ABOVE = self::ERROR_AND_ABOVE |
        self::WARNING_GROUP;            // 31

    public const NOTICE_AND_ABOVE = self::WARNING_AND_ABOVE |
        self::NOTICE_GROUP;             // 63

    public const INFO_AND_ABOVE = self::NOTICE_AND_ABOVE |
        self::INFO_GROUP;               // 127

    public const DEV_AND_ABOVE = self::INFO_AND_ABOVE |
        self::DEV_GROUP |
        self::EMPTY_GROUP;              // 4095

    public const ALL = self::DEV_AND_ABOVE |
        self::NONE_GROUP;               // 8191

    public const ERROR_AND_BELOW = self::ALL;  // 8191

    public const WARNING_AND_BELOW = self::ERROR_AND_BELOW
        & ~self::ERROR_GROUP;           // 8176

    public const NOTICE_AND_BELOW = self::WARNING_AND_BELOW
        & ~self::WARNING_GROUP;         // 8160

    public const INFO_AND_BELOW = self::NOTICE_AND_BELOW
        & ~self::NOTICE_GROUP;          // 8128

    public const DEV_AND_BELOW = self::INFO_AND_BELOW
        & ~self::INFO_GROUP;            // 8064

    public const EMPTY_AND_BELOW = self::DEV_AND_BELOW
        & ~self::DEV_GROUP;             // 7680

    public static function stringToIntLevel(string $stringLevel): int
    {
        return match ($stringLevel) {
            LogLevel::EMERGENCY     => self::EMERGENCY,
            LogLevel::ALERT         => self::ALERT,
            LogLevel::CRITICAL      => self::CRITICAL,
            LogLevel::ERROR         => self::ERROR,
            LogLevel::WARNING       => self::WARNING,
            LogLevel::NOTICE        => self::NOTICE,
            LogLevel::INFO          => self::INFO,
            LogLevel::DEBUG         => self::DEBUG,
            default                 => throw new InvalidArgumentException('unknown loglevel '.$stringLevel)
        };
    }
}
