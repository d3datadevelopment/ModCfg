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

namespace D3\ModCfg\Modules\Application\Controller\Admin;

use Exception;
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\d3utils;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Install\d3install;
use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;
use D3\ModCfg\Application\Model\Shopcompatibility\d3shopversionconverter;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use Doctrine\DBAL\Exception as DBALException;
use GuzzleHttp\Exception\RequestException;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\SystemComponentException;
use OxidEsales\Facts\Facts;
use OxidEsales\Eshop\Core\ShopVersion;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;

class d3_navigation_modcfgupdate extends d3_navigation_modcfgupdate_parent
{
    public function init()
    {
        Registry::getConfig()->getActiveView()->addTplParam('clearAll', false);
        Registry::getConfig()->getActiveView()->addTplParam('clearTpl', false);
        Registry::getConfig()->getActiveView()->addTplParam('clearLang', false);
        Registry::getConfig()->getActiveView()->addTplParam('clearTplLang', false);
        parent::init();
    }

    /**
     * @return string
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws DBALException
     */
    public function render()
    {
        $sRet = parent::render();

        if (in_array($sRet, ['header', 'header.tpl', 'header.html.twig'])
            && false == Registry::getConfig()->getConfigParam('blDemoShop')
            && class_exists(d3_cfg_mod::class)
            && d3_cfg_mod::isCallable()
            && d3_cfg_mod::get('d3modcfg_lib')->getValue('blClrTmp_shownoheaderform') != 1
        ) {
            $this->addTplParam('oModCfg', d3_cfg_mod::get('d3modcfg_lib'));
        }

        if (in_array($sRet, ['navigation.tpl', 'navigation.html.twig'])) {
            $sRet = '@'.Constants::OXID_MODULE_ID.'/admin/adm_navigation';
        }

        return $sRet;
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function doStartUpChecks()
    {
        /** @var array $aMessage */
        $aMessage = parent::doStartUpChecks();

        $aMessage = array_merge($aMessage, $this->_d3ModLicenceCheck());
        $aMessage = array_merge($aMessage, $this->_d3ModUpdateCheck());
        $aMessage = array_merge($aMessage, $this->_doModCfgUpdateRequired());

        return $aMessage;
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws SystemComponentException
     * @throws d3ShopCompatibilityAdapterException
     */
    protected function _doModCfgUpdateRequired()
    {
        if (Registry::getConfig()->getConfigParam('blD3IgnoreAutoUpdate')) {
            return [];
        }

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        $aMessages = [];

        if (class_exists(d3install::class) && d3install::getInstance()->getUpdateInstaller()->getModuleInstallations()) {
            $aMessages['d3__updatecheck'] = sprintf(
                Registry::getLang()->translateString('D3_UPDATE_REQUIRED_MODCFGUPDATE'),
                $this->_d3getUpdateWizzardUrl()
            );
        }

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }

        return $aMessages;
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _d3ModLicenceCheck()
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        $aMessages = [];

        if (false == class_exists(d3_cfg_mod::class) ||
            false == d3_cfg_mod::isCallable() ||
            d3_cfg_mod::get('d3modcfg_lib')->getValue('blModCfg_noAdminHomeInfo') >= 1
        ) {
            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                stopProfile(__METHOD__);
            }
            return $aMessages;
        }

        $aModuleList = d3_cfg_mod::get('d3modcfg_lib')->getModuleList(Registry::getConfig()->getShopId());

        foreach ($aModuleList as $mModule) {
            $sModId = is_array($mModule) ? $mModule['id'] : $mModule;

            $oModule = d3_cfg_mod::get($sModId);
            $sLinkTarget = 'http://www.oxidmodule.com/';

            if ($oModule->isExpired()) {
                $aMessages[$sModId.'_exp'] = sprintf(
                    Registry::getLang()->translateString('D3_UPDATE_EXPIREDMODULE'),
                    $sLinkTarget,
                    $oModule->getModTitle()
                );
            } elseif ($oModule->expiresSoon()) {
                $aMessages[$sModId.'_exp'] = sprintf(
                    Registry::getLang()->translateString('D3_UPDATE_EXPIRESOONMODULE'),
                    $sLinkTarget,
                    $oModule->getModTitle(),
                    $oModule->getExpireTimeSpan()
                );
            }
        }

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }

        return $aMessages;
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws Exception
     */
    protected function _d3ModUpdateCheck()
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        $aMessages = [];

        if (false == class_exists(d3_cfg_mod::class) ||
            false == d3_cfg_mod::isCallable() ||
            d3_cfg_mod::get('d3modcfg_lib')->getValue('blModCfg_noAdminHomeInfo') >= 1
        ) {
            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                stopProfile(__METHOD__);
            }
            return $aMessages;
        }

        $iAllTimeOut = 10;
        $aModuleList = d3_cfg_mod::get('d3modcfg_lib')->getModuleList(Registry::getConfig()->getShopId());
        $iModuleCount = count($aModuleList);
        $dTimeOut = $iAllTimeOut / $iModuleCount > 1 ? 1 : $iAllTimeOut / $iModuleCount;

        foreach ($aModuleList as $mModule) {
            $sModId = is_array($mModule) ? $mModule['id'] : $mModule;

            if ($this->isModuleActive($sModId) && d3_cfg_mod::get($sModId)->getActiveStatus()) {
                try {
                    /** @var d3shopversionconverter $oShopVersionConverter */
                    $oShopVersionConverter = oxNew(d3shopversionconverter::class);
                    $oUpdateServer         = d3install::getInstance()->getFromUpdateServer();
                    $oUpdateServer->setParameter('sModId', $sModId);
                    $oUpdateServer->setParameter('sEdition', $oShopVersionConverter->fixEditionToDefaultEdition(oxNew(Facts::class)->getEdition()));
                    $oUpdateServer->setParameter('sShopVersion', $oShopVersionConverter->fixVersionToDefaultEdition(ShopVersion::getVersion()));

                    if (d3_cfg_mod::get($sModId)->getLicenseData('modversion')) {
                        $oUpdateServer->setParameter('sLicModVersion', d3_cfg_mod::get($sModId)->getLicenseData('modversion'));
                    }
                    if (d3_cfg_mod::get($sModId)->getFieldData('oxversion') && d3_cfg_mod::get($sModId)->getFieldData('oxversion') != 'basic') {
                        $oUpdateServer->setParameter('sModVersion', d3_cfg_mod::get($sModId)->getFieldData('oxversion'));
                    }
                    $oUpdateServer->setParameter('dTimeOut', $dTimeOut);

                    $aRemoteModVersion = $oUpdateServer->getRemoteModuleVersion();

                    if (strtolower($aRemoteModVersion['availableversion']['version']) != '' && version_compare($aRemoteModVersion['availableversion']['version'], d3_cfg_mod::get($sModId)->getFieldData('oxversion'), '>')) {
                        $aMessages[ $sModId . '_upd' ] = $aRemoteModVersion['availableversion']['infourl'] ? sprintf(Registry::getLang()->translateString('D3_UPDATE_AVAILABLE_VERSION'), $aRemoteModVersion['availableversion']['infourl'], d3_cfg_mod::get($sModId)->getModTitle(), $aRemoteModVersion['availableversion']['version']) : sprintf(Registry::getLang()->translateString('D3_UPDATE_AVAILABLE_VERSION_NOLINK'), d3_cfg_mod::get($sModId)->getModTitle(), $aRemoteModVersion['availableversion']['version']);
                    }
                } catch (RequestException) {
                }
            }
        }

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }

        return $aMessages;
    }

    /**
     * @return string
     */
    protected function _d3getUpdateWizzardUrl()
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        $aParams = [
            'cl'         => 'd3_mod_update', // don't use d3_mod_update::class,
            'formercl'   => $this->getClassKey(),
            'formeritem' => Registry::get(Request::class)->getRequestEscapedParameter('item'),
            'blHideSkip' => 'true',
        ];
        $sURL    = Registry::get(d3utils::class)->getAdminClassUrl($aParams);

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }

        return $sURL;
    }

    /**
     * @param $sModCfgId
     *
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function isModuleActive($sModCfgId)
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        $sMetaModuleId = d3_cfg_mod::get('d3modcfg_lib')->getMetaModuleId($sModCfgId);

        /** @var Module $oModule */
        $oModule = oxNew(Module::class);
        $oModule->load($sMetaModuleId);

        $blActive = $oModule->isActive();

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }

        return $blActive;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3ClearTmp()
    {
        /** @var d3clrtmp $oClrTmp */
        $oClrTmp = oxNew(d3clrtmp::class);

        if (Registry::get(Request::class)->getRequestEscapedParameter('d3clrtmpcachetype') == 'all') {
            Registry::getConfig()->getActiveView()->addTplParam('clearAll', true);
            $oClrTmp->clearAllCache();
        } elseif (Registry::get(Request::class)->getRequestEscapedParameter('d3clrtmpcachetype') == 'tpllang') {
            Registry::getConfig()->getActiveView()->addTplParam('clearTplLang', true);
            $oClrTmp->clearFrontendCache() && $oClrTmp->clearLangCache();
        } elseif (Registry::get(Request::class)->getRequestEscapedParameter('d3clrtmpcachetype') == 'tpl') {
            Registry::getConfig()->getActiveView()->addTplParam('clearTpl', true);
            $oClrTmp->clearFrontendCache();
        } elseif (Registry::get(Request::class)->getRequestEscapedParameter('d3clrtmpcachetype') == 'lang') {
            Registry::getConfig()->getActiveView()->addTplParam('clearLang', true);
            $oClrTmp->clearLangCache();
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3ExecCommand1()
    {
        /** @var d3clrtmp $oClrTmp */
        $oClrTmp = oxNew(d3clrtmp::class);
        $oClrTmp->d3ExecCommand(1);
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3ExecCommand2()
    {
        /** @var d3clrtmp $oClrTmp */
        $oClrTmp = oxNew(d3clrtmp::class);
        $oClrTmp->d3ExecCommand(2);
    }
}
