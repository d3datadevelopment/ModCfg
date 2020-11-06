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

use \OxidEsales\Eshop\Core\Exception\StandardException;
use \OxidEsales\Eshop\Core\Registry;

/**
 * handle d3modprofile specific exceptions
 */
class d3modprofile_exception extends StandardException
{
    private $_sModId;

    protected $_sType;

    /**
     * @return string
     */
    public function getString()
    {
        return __CLASS__ . " (time: " . date(
                'Y-m-d H:i:s'
            ) . "): [{$this->code}]: {$this->message} - Faulty ModProfile: " . $this->getModCfgId();
        //." \n Stack Trace: {$this->getTraceAsString()}\n\n";
    }

    public function debugOut()
    {
        //We are most likely are already dealing with an exception so making sure no other exceptions interfere
        try {
            $sLogMsg = $this->getString() . "\n Stack Trace: {$this->getTraceAsString(
                )} \n---------------------------------------------\n";

            $utils = Registry::getUtils();
            if (method_exists($utils, 'writeToLog')) {
                // backward compatible for OXID < 6.1
                $utils->writeToLog($sLogMsg, $this->getLogFileName());
            } elseif (method_exists(Registry::class, 'getLogger')) {
                $logger = Registry::getLogger();
                $logger->error($sLogMsg);
            }
        } catch (\Exception $e) {
        }
    }

    /**
     * @param $sModId
     */
    public function setModCfgId($sModId)
    {
        $this->_sModId = $sModId;
    }

    /**
     * @return string
     */
    public function getModCfgId()
    {
        return $this->_sModId;
    }

    /**
     * @param $sType
     */
    public function setExcType($sType)
    {
        $this->_sType = $sType;
    }

    /**
     * @return string
     */
    public function getExcType()
    {
        return $this->_sType;
    }

    /**
     * @return string
     */
    public function getExcMessage()
    {
        return $this->message;
    }
}