<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

use D3\ModCfg\Application\Model\d3utils;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Log\d3log;
use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Core\Exception\CookieException;
use OxidEsales\Eshop\Core\Exception\RoutingException;
use OxidEsales\Eshop\Core\Exception\SystemComponentException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\DatabaseException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\AccessRightException;

class d3_oxshopcontrol_modcfg_extension extends d3_oxshopcontrol_modcfg_extension_parent
{
    private $_blD3Productive = null;
    /** @var d3_cfg_mod */
    private $_oClrTmpSet = null;
    private $_sClrTmpSetId = 'd3modcfg_lib';
    private $_sLogSetId = 'd3modcfg_lib';
    private $_blDevMode = null;

    /**
     * @param null $sClass
     * @param null $sFunction
     * @param null $aParams
     * @param null $aViewsChain
     * @throws Exception
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function start ($sClass = null, $sFunction = null, $aParams = null, $aViewsChain = null)
    {
        startProfile(__METHOD__);

        if (class_exists(d3log::class) && d3log::isCallable()) {
            /** @var $oD3Log d3log */
            $oD3Log = oxNew(d3log::class);
            $oD3Log->setModId('ErrorReporting');
            if (class_exists(d3_cfg_mod::class) && d3_cfg_mod::isCallable()) {
                $oD3Log->setLogType($oD3Log->getLogSet()->getFieldData('oxismodulelog'));
            }
            $oD3Log->registerErrorHandler();
        }

        // d3_cfg_mod
        if (class_exists(d3utils::class)) {
            Registry::get(d3utils::class)->d3AddCoreViewTables();
        }

        // d3clrtmp
        if ($this->_d3CheckDevMode()) {
            /** @var $oClrTmp d3clrtmp */
            $oClrTmp = oxNew(d3clrtmp::class);
            $oClrTmp->setHideErrorMsg();
            $oClrTmp->clearAllCache();
        }

        stopProfile(__METHOD__);

        parent::start($sClass, $sFunction, $aParams, $aViewsChain);

        // doesn't work if Utils::redirect is called
        \D3\ModCfg\Application\Model\Parametercontainer\Registry::getInstance()->save();
    }

    /**
     * check, if developer mode has to be enabled
     *
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _d3CheckDevMode()
    {
        if ($this->_blDevMode === null) {
            $this->_blDevMode = false;

            if ($this->_blD3Productive === null) {
                $this->_blD3Productive = Registry::getConfig()->isProductiveMode();
            }

            if ($this->_blD3Productive === false && class_exists(d3_cfg_mod::class)) {
                $this->_oClrTmpSet = d3_cfg_mod::get($this->_sClrTmpSetId);

                if (is_object($this->_oClrTmpSet) &&
                    $this->_oClrTmpSet->getValue('blClrTmp_notmpuse') == '1'
                ) {
                    $this->_blDevMode = true;
                }
            }
        }

        return $this->_blDevMode;
    }

    /**
     * @param string $sClass
     * @param string $sFunction
     * @param null $aParams
     * @param null $aViewsChain
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _process($sClass, $sFunction, $aParams = null, $aViewsChain = null)
    {
        if (class_exists(d3_cfg_mod::class) &&
            d3_cfg_mod::isCallable() && (
                d3_cfg_mod::get($this->_sLogSetId)->getValue('blLog_showAllExceptions') ||
                d3_cfg_mod::get($this->_sLogSetId)->getValue('blLog_enableExceptionReporting')
            )
        ) {
            try {
                parent::_process($sClass, $sFunction, $aParams, $aViewsChain);
            } catch (Exception $oEx) {
                if (d3_cfg_mod::get($this->_sLogSetId)->getValue('blLog_showAllExceptions')) {
                    echo $oEx->getMessage();
                    echo "<pre>";
                    print_r($oEx);
                    echo "</pre>";
                }

                $this->_d3WriteExc2Log($oEx);
            }
        } else {
            parent::_process($sClass, $sFunction, $aParams, $aViewsChain);
        }
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _d3CanWriteExc2Log()
    {
        if (d3_cfg_mod::isCallable() &&
            d3_cfg_mod::isAvailable($this->_sLogSetId) &&
            class_exists(d3log::class) &&
            d3log::isCallable() &&
            d3_cfg_mod::get($this->_sLogSetId)->getValue('blLog_enableExceptionReporting')
        ) {
            return true;
        }

        return false;
    }

    /**
     * @param $oException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _d3WriteExc2Log($oException)
    {
        if ($this->_d3CanWriteExc2Log()) {
            $class = '';
            $fnc = '';
            $line = 0;
            extract($this->getExceptionThrownClass($oException));

            /** @var d3_cfg_mod $oLogModCfg */
            $oLogModCfg = d3_cfg_mod::get($this->_sLogSetId);
            $oD3Log = $oLogModCfg->d3getLog();
            $oD3Log->setModId('ExceptionReporting');
            $oD3Log->log(
                d3log::EMERGENCY,
                $class,
                $fnc,
                $line,
                get_class($oException),
                substr(print_r($oException, true), 0, 65532) . '...'
            );
        }
    }

    /**
     * @param Exception $oException
     * @return array
     */
    public function getExceptionThrownClass($oException)
    {
        $aTrace = $oException->getTrace();

        if (count($aTrace)) {
            foreach ($oException->getTrace() as $aItem) {
                if ($aItem['class']) {
                    return array(
                        'class' => $aItem['class'],
                        'line'  => $aItem['line'] ? $aItem['line'] : 0,
                        'fnc'   => $aItem['function'] ? $aItem['function'] : 'no function defined',
                    );
                }
            }
            foreach ($oException->getTrace() as $aItem) {
                if ($aItem['file']) {
                    $sFile = 'file: '.end(array_values(explode('/', $aItem['file'])));
                    return array(
                        'class' => $sFile,
                        'line'  => $aItem['line'] ? $aItem['line'] : 0,
                        'fnc'   => $aItem['function'] ? $aItem['function'] : 'no function defined',
                    );
                }
            }
        }

        return array(
            'class' => 'no class name or file defined',
            'line'  => 0,
            'fnc'   => 'no function defined'
        );
    }

    /**
     * @param FrontendController $view
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function stopMonitoring($view)
    {
        if (false == class_exists(d3_cfg_mod::class)
            || false == d3_cfg_mod::isCallable()
            || false == d3_cfg_mod::isAvailable('d3modcfg_lib')
        ) {
            parent::stopMonitoring($view);
        } else {
            if ($this->_isDebugMode() && (!$this->isAdmin() || d3_cfg_mod::get('d3modcfg_lib')->getValue('blLog_enableAdminProfiling'))) {
                $debugLevel = $this->getConfig()->getConfigParam('iDebug');
                $debugInfo = oxNew('oxDebugInfo');

                $logId = md5(time() . rand() . rand());
                $header = $debugInfo->formatGeneralInfo();
                $display = ($debugLevel == -1) ? 'none' : 'block';
                $monitorMessage = $this->formMonitorMessage($view);

                $logMessage = "
                    <div id='oxidDebugInfo_$logId'>
                        <div style='color:#630;margin:15px 0 0;cursor:pointer'
                             onclick='var el=document.getElementById(\"debugInfoBlock_$logId\"); if (el.style.display===\"block\")el.style.display=\"none\"; else el.style.display = \"block\";'>
                              $header(show/hide)
                        </div>
                        <div id='debugInfoBlock_$logId' style='display:$display' class='debugInfoBlock' align='left'>
                            $monitorMessage
                        </div>
                        <script type='text/javascript'>
                            var b = document.getElementById('oxidDebugInfo_$logId');
                            var c = document.body;
                            if (c) { c.appendChild(b.parentNode.removeChild(b));}
                        </script>
                    </div>";

                $this->_getOutputManager()->output('debuginfo', $logMessage);
            }
        }
    }

    public function d3StopMonitoring($oView)
    {
        parent::stopMonitoring($oView);
    }

    /**
     * @param RoutingException $oEx
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function handleRoutingException($oEx)
    {
        $this->_d3WriteExc2Log($oEx);

        parent::handleRoutingException($oEx);
    }

    /**
     * @param DatabaseException $oEx
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function handleDatabaseException(DatabaseException $oEx)
    {
        $this->_d3WriteExc2Log($oEx);

        parent::handleDatabaseException($oEx);
    }

    /**
     * @param SystemComponentException $oEx
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _handleSystemException($oEx)
    {
        $this->_d3WriteExc2Log($oEx);

        parent::_handleSystemException($oEx);
    }

    /**
     * @param CookieException $oEx
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _handleCookieException($oEx)
    {
        $this->_d3WriteExc2Log($oEx);

        parent::_handleCookieException($oEx);
    }

    /**
     * @param AccessRightException $oEx
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _handleAccessRightsException($oEx)
    {
        $this->_d3WriteExc2Log($oEx);

        parent::_handleAccessRightsException($oEx);
    }

    /**
     * @param StandardException $oEx
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _handleBaseException($oEx)
    {
        $this->_d3WriteExc2Log($oEx);

        /** @var $oEx StandardException */
        parent::_handleBaseException($oEx);
    }
}
