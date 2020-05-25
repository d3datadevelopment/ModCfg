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

namespace D3\ModCfg\Application\Controller\Admin\Configuration;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_;
use D3\ModCfg\Application\Model\d3module;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install;
use D3\ModCfg\setup\d3_cfg_mod_cleaning;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\SystemComponentException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Module\Module;

if (false == Registry::getConfig()->getConfigParam('blD3IgnoreAutoUpdate') &&
    false == class_exists(d3_cfg_mod_cleaning::class)
) {
    /** @var Module $oModule */
    $oModule = oxNew(Module::class);
    $oModule->load('d3modcfg_lib');
    /** @var d3module $oD3Module */
    $oD3Module = oxNew(d3module::class, $oModule);
    try {
        $oD3Module->d3RefreshModuleMeta();
    } catch (\Exception $oEx) {}
}

/**
 * Class d3modlib
 */
class d3modlib extends d3_cfg_mod_
{
    protected $_hasListItems = false;

    /**
     * d3modlib constructor.
     * @throws DatabaseConnectionException
     * @throws StandardException
     * @throws SystemComponentException
     * @throws DBALException
     * @throws DatabaseErrorException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function __construct()
    {
        d3install::getInstance()->startUpdateFrame();

        return parent::__construct();
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->addTplParam('sListClass', d3modlib_list::class);
        $this->addTplParam('sMainClass', d3modlib_status::class);
        return parent::render();
    }
}
