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

namespace D3\ModCfg\Application\Model\Maintenance;

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Log\d3log;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\DbMetaDataHandler;
use OxidEsales\Eshop\Core\Base;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;

class d3clrtmp extends Base
{
    protected $_sModId = 'd3modcfg_lib';
    protected $_oFS;
    protected $_iLimit;
    protected $_iLimitTimeStamp;
    protected $_blHideErrorMsg = false;
    protected $_sSmartyFolderName = 'smarty';
    public $blUpdateViewCheck = false;
    public $blMallAdminCheck = true;

    /**
     * @return d3_cfg_mod
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws DBALException
     */
    protected function _d3GetSet()
    {
        return d3_cfg_mod::get($this->d3getModId());
    }

    /**
     * @return string
     */
    public function d3getModId()
    {
        return $this->_sModId;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearAllCache()
    {
        startProfile(__METHOD__);

        $this->blUpdateViewCheck = true;

        $blRet = $this->_clearCache(null, true) && $this->updateViews();

        if ($this->_d3GetSet()->getValue('blClrTmp_nofolderremove')) {
            $this->_getFileSystemHandler()->del_dir($this->getTmpPath($this->_sSmartyFolderName), false, true, true);
            $this->_createSmartyFolder();
        }

        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearFrontendCache()
    {
        startProfile(__METHOD__);

        $sPattern = "%.*(?<!class_file_paths)\.{1}php$%"; // % is delimiter; all, except 'class_file_paths'

        $blRet = (bool)$this->_clearCache($sPattern, false, $this->_sSmartyFolderName);
        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearLangCache()
    {
        startProfile(__METHOD__);

        $sPattern = '%.*langcache.*\.{1}txt$%'; // % is delimiter

        $blRet = (bool)$this->_clearCache($sPattern);
        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearMenuCache()
    {
        startProfile(__METHOD__);

        $sPattern = "%.*(oxeec|oxpec)_menu_[a-z]{2}_xml.*\.{1}txt$%"; // % is delimiter

        $blRet = (bool)$this->_clearCache($sPattern);
        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearClassPathCache()
    {
        startProfile(__METHOD__);

        $sPattern = "%.*(oxeec|oxpec)_class_file_paths\.{1}php$%"; // % is delimiter

        $blRet = (bool)$this->_clearCache($sPattern);
        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearStructureCache()
    {
        startProfile(__METHOD__);

        $sPattern = "%.*(oxeec|oxpec)_aLocal.*Cache\.{1}txt$%"; // % is delimiter

        $blRet = (bool)$this->_clearCache($sPattern);
        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearTagcloudCache()
    {
        startProfile(__METHOD__);

        $sPattern = "%.*(oxeec|oxpec)_tagcloud__.*_[0-9]{1}[_]{1,2}\.{1}txt$%"; // % is delimiter

        $blRet = (bool)$this->_clearCache($sPattern);
        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearSeoCache()
    {
        startProfile(__METHOD__);

        $sPattern = "%.*(oxeec|oxpec).*seo\.{1}txt$%"; // % is delimiter

        $blRet = (bool)$this->_clearCache($sPattern);
        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearModuleCache()
    {
        startProfile(__METHOD__);

        $sPattern = "%(config)\..*(module).*\.{1}txt$%"; // % is delimiter

        $blRet = (bool)$this->_clearCache($sPattern);
        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearDataBaseStructCache()
    {
        startProfile(__METHOD__);

        $sPattern = "%.*(oxeec|oxpec)_.*(allfields|fieldnames|tbdsc).*\.{1}txt$%"; // % is delimiter

        $blRet = (bool)$this->_clearCache($sPattern);
        stopProfile(__METHOD__);

        return $blRet;
    }

    /**
     * @param $iSlot
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearUserCache($iSlot)
    {
        startProfile(__METHOD__);

        if ($this->_d3GetSet()->getValue('sClrTmp_useraction' . $iSlot . 'name') &&
            $this->_d3GetSet()->getValue('sClrTmp_useraction' . $iSlot . 'pattern')
        ) {
            // % is delimiter
            $sPattern = "%" . str_replace(
                '%',
                '\\%',
                $this->_d3GetSet()->getValue('sClrTmp_useraction' . $iSlot . 'pattern')
            ) . "%";

            $blRet = (bool)$this->_clearCache($sPattern);
            stopProfile(__METHOD__);

            return $blRet;
        }

        return false;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearGeneratedImgs()
    {
        startProfile(__METHOD__);

        /** @var d3filesystem $oFS */
        $oFS = oxNew(d3filesystem::class);

        foreach ($this->getAllImageFolders() as $sFolder) {
            $oFS->setDevMode(false);
            $oFS->setNoAdditionalExistCheck(true);
            $oFS->del_dir($sFolder, null, true, false);
        }

        return true;
    }

    /**
     * @param $sRegExp
     * @param bool $blRecursive
     * @param bool $sFolder
     * @return int
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _clearCache($sRegExp, $blRecursive = false, $sFolder = false)
    {
        if (false == is_object($this->_d3GetSet()) || false == $this->_d3GetSet()->getValue('blClrTmp_showcleartmpoptions')) {
            $this->_getFileSystemHandler()->setDevMode(false);

            if ($this->_iLimit) {
                $this->_getFileSystemHandler()->setLimit($this->_iLimit, $this->_iLimitTimeStamp);
            }

            if (is_object($this->_d3GetSet()) && $this->_d3GetSet()->getValue('blClrTmp_nofolderremove')) {
                $blRecursive = false;
            }

            $this->_getFileSystemHandler()->setHideErrorMsg($this->_blHideErrorMsg);
            if ($sRegExp) {
                $this->_getFileSystemHandler()->setIncludeRegExp($sRegExp);
            }

            if (is_object($this->_d3GetSet()) && $this->_d3GetSet()->getValue('sClrTmp_excluderegexp')) {
                $sPattern = "%" . str_replace('%', '\\%', $this->_d3GetSet()->getValue('sClrTmp_excluderegexp')) . "%";
                $this->_getFileSystemHandler()->setExcludeRegExp($sPattern);
            }

            $iDelItems = $this->_getFileSystemHandler()->del_dir($this->getTmpPath($sFolder), false, $blRecursive);

            $this->_getFileSystemHandler()->setIncludeRegExp(null);
            $this->_getFileSystemHandler()->setExcludeRegExp(null);

            if (is_object($this->_d3GetSet()) && false == $this->_d3GetSet()->getValue('blClrTmp_nohtaccess')) {
                $this->_createTmpHtaccess();
            }

            $this->_createSmartyFolder();
        } else {
            $this->d3RunClrTmpCommand();
            $iDelItems = 1;
        }

        return $iDelItems;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _createTmpHtaccess()
    {
        startProfile(__METHOD__);
        $sFileName = $this->getTmpPath() . '.htaccess';

        if (false == $this->_getFileSystemHandler()->exists($sFileName)) {
            $sContent =
                "# disabling file access\n<FilesMatch .*>\n<IfModule mod_authz_core.c>\nRequire all denied\n</IfModule>\n<IfModule !mod_authz_core.c>\norder allow,deny\ndeny from all\n</IfModule>".
                "\n</FilesMatch>\n\nOptions -Indexes";
            $this->_getFileSystemHandler()->createFile($sFileName, $sContent, true);
        }
        stopProfile(__METHOD__);
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _createSmartyFolder()
    {
        startProfile(__METHOD__);
        $sFolder = $this->_getFileSystemHandler()->trailingslashit($this->getTmpPath() . $this->_sSmartyFolderName);

        if (false == $this->_getFileSystemHandler()->exists($sFolder)) {
            $this->_getFileSystemHandler()->create_dir_tree($sFolder);
        }

        stopProfile(__METHOD__);
    }

    /**
     * @return bool|null
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateViews()
    {
        startProfile(__METHOD__);
        if (false == $this->blUpdateViewCheck ||
            (is_object($this->_d3GetSet()) && false == $this->_d3GetSet()->getValue('blClrTmp_noviewupdate'))
        ) {
            if (false == $this->blMallAdminCheck
                || Registry::getSession()->getVariable("malladmin")
            ) {
                /** @var $oDbHandler DbMetaDataHandler */
                $oDbHandler = oxNew(DbMetaDataHandler::class);
                return $oDbHandler->updateViews();
            }
        }

        stopProfile(__METHOD__);

        return null;
    }

    /**
     * @param bool|bool $sFolder
     * @return string
     */
    public function getTmpPath($sFolder = false)
    {
        $sTmpPath = Registry::getConfig()->getConfigParam('sCompileDir');

        if ($sFolder) {
            $sTmpPath = $this->_getFileSystemHandler()->trailingslashit(
                $this->_getFileSystemHandler()->trailingslashit($sTmpPath) . $sFolder
            );
        }

        return $sTmpPath;
    }

    /**
     * @return d3filesystem
     */
    protected function _getFileSystemHandler()
    {
        if (false == $this->_oFS) {
            $this->_oFS = oxNew(d3filesystem::class);
        }

        return $this->_oFS;
    }

    /**
     * @param $iLimit
     * @param $iLimitTimeStamp
     */
    public function setLimit($iLimit, $iLimitTimeStamp)
    {
        $this->_iLimit          = $iLimit;
        $this->_iLimitTimeStamp = $iLimitTimeStamp;
    }

    public function setHideErrorMsg()
    {
        $this->_blHideErrorMsg = true;
    }

    /**
     * @return array
     */
    public function getAllImageFolders()
    {
        $aDirs = array();

        foreach ($this->d3getProductImageTypes() as $sImgType) {
            $aDirs[] = Registry::getConfig()->getPictureDir(true).
                Registry::get("oxUtilsFile")->getImageDirByType($sImgType, true);
        }

        return $aDirs;
    }

    /**
     * @return array
     */
    public function d3getProductImageTypes()
    {
        $aTypes = array('ICO', 'TH');
        $aPicRange = range(1, 12);
        array_walk($aPicRange, array($this, 'd3fixPicTypeNames'), 'M');

        return array_merge($aTypes, $aPicRange);
    }

    /**
     * @param $sType
     * @param $sKey
     * @param $sPrefix
     */
// ToDo: what is Parameter $sKey??
    public function d3fixPicTypeNames(&$sType, $sKey, $sPrefix)
    {
        unset($sKey);
        $sType = $sPrefix.$sType;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3RunClrTmpCommand()
    {
        if (false == is_object($this->_d3GetSet())) {
            return;
        }

        for($i = 1; $i <= 2; $i++) {
            $sClrTmpReplacementName = "sClrTmp_systemaction{$i}clrtmpreplace";
            if ($this->_d3GetSet()->getValue($sClrTmpReplacementName)) {
                $this->d3ExecCommand($i);
            }
        }
    }

    /**
     * @param $iSlot
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3ExecCommand($iSlot)
    {
        if (false == is_object($this->_d3GetSet())) {
            return;
        }

        $sCommandName = "sClrTmp_systemaction{$iSlot}command";
        if ($this->_d3GetSet()->getValue($sCommandName)) {
            $oLog = $this->_d3GetSet()->d3getLog();
            if (function_exists('exec') && exec('echo EXEC') == 'EXEC') {
                exec(escapeshellcmd($this->_d3GetSet()->getValue($sCommandName)), $aReturn);
                $oLog->log(
                    d3log::INFO,
                    __CLASS__,
                    __FUNCTION__,
                    __LINE__,
                    'run system command',
                    'Command: '. $this->_d3GetSet()->getValue($sCommandName).PHP_EOL.
                    'Result: '. implode(PHP_EOL, $aReturn)
                );
            } else {
                $oLog->log(d3log::ERROR, __CLASS__, __FUNCTION__, __LINE__, 'exec function unavailable');
            }
        }
    }
}
