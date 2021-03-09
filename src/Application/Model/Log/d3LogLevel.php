<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Log;

use Psr\Log\LogLevel;

class d3LogLevel extends LogLevel
{
    // single log levels
    const EMERGENCY = 0;                // 1
    const ALERT = 1;                    // 2
    const CRITICAL = 2;                 // 4
    const ERROR = 3;                    // 8
    const WARNING = 4;                  // 16
    const NOTICE = 5;                   // 32
    const INFO = 6;                     // 64
    const DEBUG = 7;                    // 128
    const TEST = 8;                     // 256
    const LOGLEVEL_9 = 9;               // 512  // not used
    const LOGLEVEL_10 = 10;             // 1024 // not used
    const LOGLEVEL_11 = 11;             // 2048 // not used
    const NONE = 12;                    // 4096

    // grouped log levels
    const ERROR_GROUP = 0 |
        1 << self::EMERGENCY |
        1 << self::ALERT |
        1 << self::CRITICAL |
        1 << self::ERROR;               // 15

    const WARNING_GROUP = 0 |
        1 << self::WARNING;             // 16

    const NOTICE_GROUP = 0 |
        1 << self::NOTICE;              // 32

    const INFO_GROUP = 0 |
        1 << self::INFO;                // 64

    const DEV_GROUP = 0 |
        1 << self::DEBUG |
        1 << self::TEST;                // 384

    const EMPTY_GROUP = 0 |
        1 << self::LOGLEVEL_9 |
        1 << self::LOGLEVEL_10 |
        1 << self::LOGLEVEL_11;         // 3584

    const NONE_GROUP = 0 |
        1 << self::NONE;                // 4096

    // ranged log levels
    const ERROR_AND_ABOVE = 0 |
        self::ERROR_GROUP;              // 15

    const WARNING_AND_ABOVE = self::ERROR_AND_ABOVE |
        self::WARNING_GROUP;            // 31

    const NOTICE_AND_ABOVE = self::WARNING_AND_ABOVE |
        self::NOTICE_GROUP;             // 63

    const INFO_AND_ABOVE = self::NOTICE_AND_ABOVE |
        self::INFO_GROUP;               // 127

    const DEV_AND_ABOVE = self::INFO_AND_ABOVE |
        self::DEV_GROUP |
        self::EMPTY_GROUP;              // 4095

    const ALL = self::DEV_AND_ABOVE |
        self::NONE_GROUP;               // 8191

    const ERROR_AND_BELOW = self::ALL;  // 8191

    const WARNING_AND_BELOW = self::ERROR_AND_BELOW
        & ~self::ERROR_GROUP;           // 8176

    const NOTICE_AND_BELOW = self::WARNING_AND_BELOW
        & ~self::WARNING_GROUP;         // 8160

    const INFO_AND_BELOW = self::NOTICE_AND_BELOW
        & ~self::NOTICE_GROUP;          // 8128

    const DEV_AND_BELOW = self::INFO_AND_BELOW
        & ~self::INFO_GROUP;            // 8064

    const EMPTY_AND_BELOW = self::DEV_AND_BELOW
        & ~self::DEV_GROUP;             // 7680
}