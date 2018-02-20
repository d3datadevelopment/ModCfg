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
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Controller\Admin\Log;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Log\d3log;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;

class d3_cfg_log_cleanup extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3_cfg_log_cleanup.tpl';

    protected $_sModId = 'd3modcfg_lib';

    protected $_sMenuSubItemTitle = 'd3mxlog';

    public function delete()
    {
        // gelöscht wird über List-Klasse
        return;
    }

    /**
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogTypeList()
    {
        /** @var $oLog d3log */
        $oLog = oxNew(d3log::class);

        return $oLog->getLogTypeList();
    }

    /**
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getModIdList()
    {
        /** @var $oLog d3log */
        $oLog = oxNew(d3log::class);

        return $oLog->getModIdList();
    }

    /**
     * @return array
     */
    public function d3getAdditionalFormParams()
    {
        $aParams = parent::d3getAdditionalFormParams();

        if (Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId')) {
            $aParams['sD3ModId'] = Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId');
        }

        return $aParams;
    }
}
