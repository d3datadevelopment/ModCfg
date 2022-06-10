<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Exception;

/**
 * handle d3_cfg_mod specific exceptions
 */
class d3_cfg_mod_exception extends d3modprofile_exception
{
    protected $_sCompareData;

    /**
     * @return string
     */
    public function getString()
    {
        $sStr = __CLASS__ . " (time: " . date(
                'Y-m-d H:i:s'
            ) . "): [{$this->code}]: {$this->message} ";

        if ($this->getCompareData()) {
            $sStr .= "(".$this->getCompareData().") ";
        }

        $sStr .= "- Faulty ModCfg: " . $this->getModCfgId();
        //." \n Stack Trace: {$this->getTraceAsString()}\n\n";

        return $sStr;
    }

    /**
     * @param $sCompareData
     */
    public function setCompareData($sCompareData)
    {
        $this->_sCompareData = $sCompareData;
    }

    /**
     * @return mixed
     */
    public function getCompareData()
    {
        return $this->_sCompareData;
    }
}