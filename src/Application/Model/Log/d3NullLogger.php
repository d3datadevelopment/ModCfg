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

use Psr\Log\LoggerTrait;

class d3NullLogger implements d3LogInterface
{
    use LoggerTrait;

    /**
     * @param string $sModId
     *
     * @return d3LogInterface
     */
    public function setModId($sModId)
    {
        return $this;
    }

    /**
     * @param string $sProfileId
     *
     * @return d3LogInterface
     */
    public function setProfileId($sProfileId)
    {
        return $this;
    }

    /**
     * @param int      $iLogType1
     * @param int|null $iLogType2
     * @param int|null $iLogType3
     *
     * @return d3LogInterface
     */
    public function setLogType($iLogType1, $iLogType2 = null, $iLogType3 = null)
    {
        return $this;
    }

    /**
     * @param int $iLogType
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3LogInterface
     */
    public function log(
        $iLogType = d3LogLevel::EMERGENCY,
        $sClass = __CLASS__,
        $sFnc = __FUNCTION__,
        $iLine = __LINE__,
        $sAction = null,
        $mText = null,
        $blDie = false
    ) {
        return $this;
    }

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
    public function emergency($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this;
    }

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
    public function alert($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this;
    }

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
    public function critical($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this;
    }

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
    public function error($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this;
    }

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
    public function warning($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this;
    }

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
    public function notice($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this;
    }

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
    public function info($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this;
    }

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
    public function debug($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this;
    }

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
    public function test($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this;
    }

    /**
     * @param int $iType
     *
     * @return int
     */
    public function addLogType($iType)
    {
        return d3LogLevel::NONE;
    }

    /**
     * @param int $iType
     *
     * @return int
     */
    public function removeLogType($iType)
    {
        return d3LogLevel::NONE;
    }

    public function d3GetProfiling()
    {}

    public function convertAdminLogSettings()
    {}
}