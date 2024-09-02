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

namespace D3\ModCfg\Application\Controller\Admin\Configuration;

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod_licencecheck;
use D3\ModCfg\Application\Model\Log\d3log;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;

class d3modlib_status extends d3mod_status
{
    /**
     * additional multilang item, which will added as last part to help url
     *
     * @var string
     */
    protected $_sHelpLinkMLAdd = 'D3MODCFG_LIB_HELPLINK_STATUS';
    protected $_sRemoteUpdateSessionVarname = 'd3RemoteLibList';
    protected $_sRemoteModuleSessionVarname = 'd3RemoteLibs';
    public $aRemoteLibs = [];
    protected $_aHiddenModules = ['d3install_lib', 'd3log_lib', 'd3clrtmp_lib'];

    /**
     * @return string
     */
    public function getModuleType()
    {
        return 'lib';
    }

    /**
     * @return bool
     */
    public function getShowNewItems()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function showNoUpdateMessage()
    {
        $oLicenceCheck = new d3_cfg_mod_licencecheck(new d3_cfg_mod());
        return $oLicenceCheck->isSource();
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getUsedMailMessageSlots()
    {
        /** @var d3log $oLog */
        $oLog = oxNew(d3log::class);
        $aSlots = $oLog->getUsedMailMessageSlots();
        array_push($aSlots, end($aSlots) + 1);

        return $aSlots;
    }

    /**
     * @return string
     */
    public function getTitleIdent()
    {
        return 'D3_MOD_LIB_INSTALLED';
    }
}
