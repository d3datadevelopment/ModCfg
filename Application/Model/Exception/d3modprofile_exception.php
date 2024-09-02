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

namespace D3\ModCfg\Application\Model\Exception;

use DateTimeImmutable;
use Exception;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Utils;

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
        return self::class . " (time: " . (new DateTimeImmutable())->format('Y-m-d H:i:s')
            . "): [{$this->code}]: {$this->message} - Faulty ModProfile: " . $this->getModCfgId();
        //." \n Stack Trace: {$this->getTraceAsString()}\n\n";
    }

    public function debugOut()
    {
        //We are most likely are already dealing with an exception so making sure no other exceptions interfere
        try {
            $sLogMsg = $this->getString() . "\n Stack Trace: {$this->getTraceAsString(
            )} \n---------------------------------------------\n";

            $logger = Registry::getLogger();
            $logger->error($sLogMsg);
        } catch (Exception) {
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
