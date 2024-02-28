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
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Controller\Admin\Maintenance;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\SystemComponentException;

class d3sysitems extends d3_cfg_mod_
{
    protected $_hasListItems = false;

    /**
     * d3sysitems constructor.
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

        parent::__construct();
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->addTplParam('sListClass', d3sysitems_list::class);
        $this->addTplParam('sMainClass', d3cfgitems::class);
        return parent::render();
    }
}
