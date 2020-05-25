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

namespace D3\ModCfg\Application\Controller\Admin\Maintenance;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Shopcompatibility\d3ShopCompatibilityAdapterHandler;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\TableViewNameGenerator;

class d3maintenance extends d3_cfg_mod_main
{
    public $_sThisTemplate = 'd3maintenance.tpl';

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws DBALException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function repairModuleDbItems()
    {
        //d3utils::getInstance()->repairModuleStructure();

        // unable to disable moduwle without session lost

        $sModulesDir = Registry::getConfig()->getModulesDir();
        $oModuleList = oxNew( "oxModuleList" );
        $aModules = $oModuleList->getModulesFromDir( $sModulesDir );

        $aActiveModules = array();

        /** @var $oModule Module */
        foreach ($aModules as $oModule) {
            if ($oModule->isRegistered() && $oModule->isActive()) {
                $aActiveModules[] = $oModule->getId();
            }
        }

        $aRemoveFields = array('aDisabledModules', 'aModulePaths', 'aModuleTemplates', 'aModuleVersions',
            'aModuleEvents', 'aModules', 'aModuleFiles');

        /** @var TableViewNameGenerator $oViewNameGenerator */
        $oViewNameGenerator = oxNew(TableViewNameGenerator::class);

        $oQueryBuilder = d3database::getInstance()->getQueryBuilder();
        $oQueryBuilder->delete($oViewNameGenerator->getViewName('oxconfig'))
            ->where("oxvarnamme IN ('".implode($aRemoveFields, "','")."'")
            ->andWhere('oxshopid = '.$oQueryBuilder->createNamedParameter(Registry::getConfig()->getActiveShop()->getId()));

        DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->Execute($oQueryBuilder->getSQL(), $oQueryBuilder->getParameters());

        foreach ($aActiveModules as $sCurrentModId) {
            /** @var $oMod Module */
            $oMod = oxNew(Module::class);
            $oMod->load($sCurrentModId);

            /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
            $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
            $oD3CompatibilityAdapterHandler->call('oxmodule__activate', array($oMod));
        }
    }
}
