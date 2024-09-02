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

namespace D3\ModCfg\Application\Controller\Admin\Log;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\Log\d3log;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;

class d3_cfg_log_cleanup extends d3_cfg_mod_main
{
    protected $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/log/cleanup';

    protected $_sModId = 'd3modcfg_lib';

    protected $_sMenuSubItemTitle = 'd3mxlog';

    public function delete()
    {
        // geloescht wird ueber List-Klasse
        return;
    }

    /**
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogTypeList()
    {
        /** @var d3log $oLog */
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
        /** @var d3log $oLog */
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
