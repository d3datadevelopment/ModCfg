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

interface d3LogInterface
{
    /**
     * @param string $sModId
     *
     * @return d3LogInterface
     */
    public function setModId($sModId);

    /**
     * @param string $sProfileId
     *
     * @return d3LogInterface
     */
    public function setProfileId($sProfileId);

    /**
     * @param int      $iLogType1
     * @param int|null $iLogType2
     * @param int|null $iLogType3
     *
     * @return d3LogInterface
     */
    public function setLogType($iLogType1, $iLogType2 = null, $iLogType3 = null);

    /**
     * @param $sStatus
     * @param false $oSet
     * @return false
     */
    public function getLogStatus($sStatus, $oSet = false);

    /**
     * @param int         $level
     * @param string      $sClass
     * @param string      $sFnc
     * @param int         $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool        $blDie
     *
     * @return d3LogInterface
     */
    public function log(
        $level = d3LogLevel::EMERGENCY,
        $sClass = self::class,
        $sFnc = __FUNCTION__,
        $iLine = __LINE__,
        $sAction = null,
        $mText = null,
        $blDie = false
    );

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function emergency($sClass = self::class, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false);

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function alert($sClass = self::class, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false);

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function critical($sClass = self::class, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false);

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function error($sClass = self::class, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false);

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function warning($sClass = self::class, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false);

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function notice($sClass = self::class, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false);

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function info($sClass = self::class, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false);

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function debug($sClass = self::class, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false);

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function test($sClass = self::class, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false);

    /**
     * @param int $iType
     *
     * @return int
     */
    public function addLogType($iType);

    /**
     * @param int $iType
     *
     * @return int
     */
    public function removeLogType($iType);

    public function d3GetProfiling();

    public function convertAdminLogSettings();
}
