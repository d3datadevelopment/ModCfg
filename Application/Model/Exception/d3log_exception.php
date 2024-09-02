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

use D3\ModCfg\Application\Model\Log\d3log;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;

class d3log_exception extends StandardException
{
    /** @var d3log */
    public $oD3Log;
    public $iErrorLevel;
    public $sLogText;

    /**
     * @param d3log $oD3Log
     * @param int   $iErrorLevel
     * @param       $sMessage
     */
    public function __construct(d3log $oD3Log, $iErrorLevel = d3log::ERROR, $sMessage = "not set")
    {
        $this->setLog($oD3Log);
        $this->setErrorLevel($iErrorLevel);

        parent::__construct($sMessage);
    }

    /**
     * @param d3log $oD3Log
     */
    public function setLog(d3log $oD3Log)
    {
        $this->oD3Log = $oD3Log;
    }

    /**
     * @param int $iErrorLevel
     */
    public function setErrorLevel($iErrorLevel = d3log::ERROR)
    {
        $this->iErrorLevel = $iErrorLevel;
    }


    /**
     * @param $sMessage
     */
    public function setLogText($sMessage)
    {
        $this->sLogText = $sMessage;
    }

    /**
     * @return string
     */
    public function getLogText()
    {
        return $this->sLogText;
    }

    /**
     * @return mixed|void
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function debugOut()
    {
        $logger = Registry::getLogger();
        $logger->error($this);

        $this->oD3Log->log(
            $this->iErrorLevel,
            self::class,
            __FUNCTION__,
            __LINE__,
            $this->getMessage(),
            $this->getLogText()
        );
    }
}
