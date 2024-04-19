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

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\d3utils;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;

class d3cfgitems extends d3_cfg_mod_main
{
    public $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/maintenance/cfgitems';
    protected $_sMenuSubItemTitle = 'd3mxsysitems';
    protected $_blEditMode = false;
    /** @var d3filesystem */
    public $oFS;
    protected $_aFiles = [
        'config'     => [
            'sFileName'        => 'config.inc.php',
            'blWriteProtected' => true,
        ],
        'custconfig' => [
            'sFileName'        => 'cust_config.inc.php',
            'blWriteProtected' => true,
        ],
        'd3custconfig' => [
            'sFileName'        => 'd3cust_config.inc.php',
            'blWriteProtected' => true,
        ],
        'functions'  => [
            'sFileName'        => 'modules/functions.php',
            'blWriteProtected' => false,
        ],
        'env'  => [
            'sFileName'        => '../.env',
            'blWriteProtected' => false,
        ],
    ];
    public $blSaveRet;

    /**
     * @return string
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws DBALException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function render()
    {
        if (Registry::get(d3utils::class)->hasDemoshopMode()) {
            $mTplParam = Registry::getLang()->translateString('D3_CFG_CFGITEM_DEMOTEXT');
        } else {
            $this->oFS = oxNew(d3filesystem::class);
            $mTplParam = $this->blSaveRet === false ?
                Registry::get(Request::class)->getRequestEscapedParameter('newcfg') :
                file_get_contents($this->getFileName());
            //$this->oFS->readFile($this->getFileName());
        }

        $this->addTplParam('sCfgContent', $mTplParam);
        $this->addTplParam('sFileSelect', Registry::get(Request::class)->getRequestEscapedParameter('sFileSelect'));

        return parent::render();
    }

    /**
     * @return array
     */
    public function getEditableFiles()
    {
        return $this->_aFiles;
    }

    /**
     * @param bool $sFileId
     * @return string
     */
    public function getFileName($sFileId = false)
    {
        $sSelectedFileId = $sFileId ?: Registry::get(Request::class)->getRequestEscapedParameter('sFileSelect');

        if (false == $sSelectedFileId) {
            $aFileKeys       = array_keys($this->getEditableFiles());
            $sSelectedFileId = $aFileKeys[0];
        }

        if (false == $this->oFS) {
            $this->oFS = oxNew(d3filesystem::class);
        }
        $sFile = $this->oFS->trailingslashit(Registry::getConfig()->getConfigParam('sShopDir')) .
            $this->_aFiles[$sSelectedFileId]['sFileName'];

        return $sFile;
    }

    /**
     * @return bool
     */
    public function getWritePermission()
    {
        if (false == $this->oFS) {
            $this->oFS = oxNew(d3filesystem::class);
        }

        if (is_writable($this->getFileName())) {
            return true;
        }

        return false;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function save()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $this->blSaveRet = false;

            if (false == $this->oFS) {
                $this->oFS = oxNew(d3filesystem::class);
            }
            $sContent = Registry::get(Request::class)->getRequestEscapedParameter('newcfg');

            if ($this->hasRequiredWriteProtection()) {
                $sPermission = 0444;
            } else {
                $sPermission = 0644;
            }

            if ($this->oFS->chmod($this->getFileName(), 0644)) {
                $this->blSaveRet = $this->oFS->createFile($this->getFileName(), $sContent, true, $sPermission);
            }
        }
    }

    public function editFile()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $this->_blEditMode = true;
        }
    }

    /**
     * @return bool
     */
    public function isWriteable()
    {
        if ($this->_blEditMode === true) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function hasRequiredWriteProtection()
    {
        $sFileId = Registry::get(Request::class)->getRequestEscapedParameter('sFileSelect');

        if (false == $sFileId) {
            $aFileKeys = array_keys($this->getEditableFiles());
            $sFileId   = $aFileKeys[0];
        }

        return $this->_aFiles[$sFileId]['blWriteProtected'];
    }
}
