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

namespace D3\ModCfg\Application\Model\Filegenerator;

use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\d3str;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Shopcompatibility\d3ShopCompatibilityAdapterHandler;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Application\Model\Shop;

class d3filegenerator
{
    protected $_aContentList = array();

    protected $_sContentType;
    protected $_sContentNameBaseKey = 'D3_FILEGENERATOR_';

    /**
     * @return array
     */
    public function getContentList()
    {
        $aContentList = array();

        foreach (array_keys($this->_aContentList) as $sKey) {
            $aContentList[$sKey] = $this->_translateContentName($sKey);
        }

        return $aContentList;
    }

    /**
     * @param $sType
     *
     * @return bool
     */
    public function isInContentList($sType)
    {
        return in_array($sType, array_keys($this->_aContentList));
    }

    /**
     * @param $sType
     * @param $sTemplateName
     */
    public function addToContentList($sType, $sTemplateName)
    {
        $this->_aContentList[$sType] = $sTemplateName;
        $this->setContentType($sType);
    }

    /**
     * @param $sType
     */
    public function removeFromContentList($sType)
    {
        if ($this->isInContentList($sType)) {
            unset($this->_aContentList[$sType]);
        }
    }

    /**
     * @param $sContentType
     */
    public function setContentType($sContentType)
    {
        $this->_sContentType = $sContentType;
    }

    /**
     * @param $sKey
     *
     * @return string
     */
    protected function _translateContentName($sKey)
    {
        return Registry::getLang()->translateString($this->_sContentNameBaseKey.strtoupper($sKey), null, 1);
    }

    /**
     * @param $sDownloadFileName
     *
     * @throws StandardException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function startDownload($sDownloadFileName)
    {
        $sContent = $this->_getFileContent();

        /** @var d3filesystem $oD3FS */
        $oD3FS = oxNew(d3filesystem::class);
        $oD3FS->startDirectDownload($sDownloadFileName, $sContent);
    }

    /**
     * @param      $sFilePath
     * @param bool $blOverwrite
     * @param null $sChmod
     *
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function createFile($sFilePath, $blOverwrite = true, $sChmod = null)
    {
        $sContent = $this->_getFileContent();

        /** @var d3filesystem $oD3FS */
        $oD3FS = oxNew(d3filesystem::class);
        return $oD3FS->createFile($sFilePath, $sContent, $blOverwrite, $sChmod);
    }

    /**
     * @return string
     * @throws StandardException
     */
    protected function _getFileContent()
    {
        if (false == $this->isInContentList($this->_sContentType)) {
            /** @var StandardException $oException */
            $oException = oxNew(StandardException::class, 'no valid content source set');
            throw($oException);
        }

        $oSmarty = $this->_configureSmarty();
        $sTemplate = $this->_aContentList[$this->_sContentType];
        $sContent = $oSmarty->fetch($sTemplate);

        return $sContent;
    }

    /**
     * @return string
     * @throws d3ShopCompatibilityAdapterException
     * @throws StandardException
     */
    protected function getContentTplPath()
    {
        /** @var d3str $oD3Str */
        $oD3Str = oxNew(d3str::class);
        /** @var Module $oModule */
        $oModule = oxNew(Module::class);
        $sModuleId = 'd3modcfg_lib';

        /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
        $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
        $sModulePath = $oD3CompatibilityAdapterHandler->call(
            'oxmodule__getModuleFullPath',
            array($oModule, $sModuleId)
        );

        $sPath = $oD3Str->untrailingslashit($sModulePath."/views/admin/tpl/modcfg-pattern");

        return $sPath;
    }

    /**
     * @return \Smarty
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    protected function _configureSmarty()
    {
        /** @var Shop $oShop */
        $oShop = Registry::getConfig()->getActiveShop();
        /** @var \Smarty $oSmarty */
        $oSmarty = Registry::get("oxUtilsView")->getSmarty();
        $oSmarty->assign('oShop', $oShop);
        $oSmarty->assign('oConfig', Registry::getConfig());
        $oSmarty->assign('oViewConf', Registry::getConfig()->getActiveView()->getViewConfig());

        $oSmarty->template_dir = $this->getContentTplPath();

        return $oSmarty;
    }

    /**
     * @return string
     */
    public function getPHPInterpreterPath()
    {
        return PHP_BINDIR;
    }
}
