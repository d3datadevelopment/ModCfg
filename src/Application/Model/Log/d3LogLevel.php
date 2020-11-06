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
    const EMERGENCY = 0; // 1
    const ALERT = 1; // 2
    const CRITICAL = 2; // 4
    const ERROR = 3; // 8
    const WARNING = 4; // 16
    const NOTICE = 5; // 32
    const INFO = 6; // 64
    const DEBUG = 7; // 128
    const TEST = 8; // 256
    const LOGLEVEL_9 = 9; // 512 // not used
    const LOGLEVEL_10 = 10; // 1024 // not used
    const LOGLEVEL_11 = 11; // 2048 // not used
    const NONE = 12; // 4096

    // grouped log levels
    const ERROR_AND_ABOVE = 0 |
        1 << self::EMERGENCY |
        1 << self::ALERT |
        1 << self::CRITICAL |
        1 << self::ERROR;   // 15

    const WARNING_AND_ABOVE = self::ERROR_AND_ABOVE |
        1 << self::WARNING; // 31

    const NOTICE_AND_ABOVE = self::WARNING_AND_ABOVE |
        1 << self::NOTICE;  // 63

    const INFO_AND_ABOVE = self::NOTICE_AND_ABOVE |
        1 << self::INFO;    // 127

    const ALL = self::INFO_AND_ABOVE |
        1 << self::DEBUG |
        1 << self::TEST |
        1 << self::LOGLEVEL_9 |
        1 << self::LOGLEVEL_10 |
        1 << self::LOGLEVEL_11 |
        0 << self::NONE;    // 4095 // all without NONE
}