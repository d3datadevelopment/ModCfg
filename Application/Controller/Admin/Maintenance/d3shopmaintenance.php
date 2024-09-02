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

namespace D3\ModCfg\Application\Controller\Admin\Maintenance;

use Assert\Assert;
use Assert\InvalidArgumentException;
use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Maintenance\Actions\ActionInterface;
use D3\ModCfg\Application\Model\Maintenance\d3maintenanceactions;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use ReflectionException;

class d3shopmaintenance extends d3_cfg_mod_main
{
    public $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/maintenance/shopmaintenance';
    protected $_sMenuSubItemTitle = 'd3tbclclr_mtn';
    protected $_sModId = 'd3modcfg_lib';

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws ReflectionException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function render(): string
    {
        $sRet = parent::render();
        $this->addTplParam(
            'aCheckResults',
            $this->getMaintenanceActions()->getCheckResults()
        );

        return $sRet;
    }

    public function checkItems(): void
    {
        $this->getMaintenanceActions()->checkAllActions();
    }

    /**
     * @return d3maintenanceactions
     */
    public function getMaintenanceActions(): d3maintenanceactions
    {
        return oxNew(d3maintenanceactions::class);
    }

    /**
     * @return string
     */
    protected function _d3GetModId(): string
    {
        return $this->_sModId;
    }

    /**
     * @return void
     */
    public function tidy(): void
    {
        try {
            $action = $this->getActionFromParameter();
            $action->fixIt();
            Registry::getSession()->deleteVariable('aD3ShopMaintenanceResults');
        } catch (InvalidArgumentException $invalid_argument_exception) {
            Registry::getLogger()->error($invalid_argument_exception, $_REQUEST);
            Registry::getUtilsView()->addErrorToDisplay($invalid_argument_exception);
        }
    }

    /**
     * @return ActionInterface
     */
    protected function getActionFromParameter(): ActionInterface
    {
        $maintenanceController = oxNew(d3maintenanceactions::class);
        $list = array_change_key_case($maintenanceController->getActionList());
        $request = strtolower(Registry::getRequest()->getRequestEscapedParameter('action'));

        Assert::that($request)->inArray(array_keys($list), Registry::getLang()->translateString('D3_CFG_CLRTMP_UNKNOWN_ACTION'));
        Assert::that($list[$request])->classExists();
        $action = oxNew($list[$request]);
        Assert::that($action)->isInstanceOf(ActionInterface::class);
        return $action;
    }
}
