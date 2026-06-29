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
use Throwable;

class d3log_exception extends StandardException
{
    public string $sLogText;

    /**
     * @param d3log $oD3Log
     * @param int   $iErrorLevel
     * @param       $sMessage
     */
    public function __construct(public d3log $oD3Log, public int $iErrorLevel = d3log::ERROR, $sMessage = "not set")
    {
        parent::__construct($sMessage);
    }

    /**
     * @param d3log $oD3Log
     */
    public function setLog(d3log $oD3Log): void
    {
        $this->oD3Log = $oD3Log;
    }

    /**
     * @param int $iErrorLevel
     */
    public function setErrorLevel(int $iErrorLevel = d3log::ERROR): void
    {
        $this->iErrorLevel = $iErrorLevel;
    }


    /**
     * @param $sMessage
     */
    public function setLogText($sMessage): void
    {
        $this->sLogText = $sMessage;
    }

    /**
     * @return string
     */
    public function getLogText(): string
    {
        return $this->sLogText;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function debugOut(): void
    {
        try {
            $logger = Registry::getLogger();

            if ($logger && method_exists($logger, 'error')) {
                $logger->error($this);
            }
        } catch (Throwable $exception) {
            error_log(
                sprintf(
                    '[%s] Registry logger failed in %s::debugOut(): %s',
                    date('Y-m-d H:i:s'),
                    self::class,
                    $exception->getMessage()
                )
            );
        }

        try {
            if ($this->oD3Log && method_exists($this->oD3Log, 'log')) {
                $this->oD3Log->log(
                    $this->iErrorLevel,
                    self::class,
                    __FUNCTION__,
                    __LINE__,
                    $this->getMessage(),
                    $this->getLogText()
                );
            }
        } catch (Throwable $exception) {
            error_log(
                sprintf(
                    '[%s] D3 logger failed in %s::debugOut(): %s',
                    date('Y-m-d H:i:s'),
                    self::class,
                    $exception->getMessage()
                )
            );
        }
    }
}
