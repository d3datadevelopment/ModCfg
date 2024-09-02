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

namespace D3\ModCfg\Application\Controller\Admin\TPLBlocks;

use D3\ModCfg\Application\Model\d3oxtplblocks;
use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Exception\StandardException;

class d3tplblocks_base extends d3_cfg_mod_main
{
    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function render()
    {
        $sRet = parent::render();

        /** @var d3oxtplblocks $oTplBlock */
        $oTplBlock = oxNew(d3oxtplblocks::class);
        $this->addTplParam('edit', $oTplBlock);

        if (method_exists($this, 'getEditObjectId')) {
            $soxId = $this->getEditObjectId();
        } else {
            $soxId = Registry::get(Request::class)->getRequestEscapedParameter("oxid");
            $this->addTplParam("oxid", $soxId);

            // check if we right now saved a new entry
            if ($this->_sSavedId) {
                $soxId = $this->_sSavedId;
                $this->addTplParam("oxid", $soxId);

                // for reloading upper frame
                $this->addTplParam("updatelist", "1");
            }
        }

        if ($soxId && $soxId != "-1") {
            // load object
            if (!$oTplBlock instanceof d3oxtplblocks && !($oTplBlock->load($soxId))) {
                $soxId = '-1';
                $this->addTplParam('oxid', $soxId);
            } else {
                $oTplBlock->load($soxId);
            }
        }

        return $sRet;
    }
}
