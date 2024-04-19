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
 * @copyright (C) D3 Data Development, Thomas Dartsch
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Installcheck;

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use Doctrine\DBAL\ParameterType;
use OxidEsales\Eshop\Application\Model\Shop;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class d3InstallCheckBlockItemsAreActive implements d3InstallCheckInterface
{
    protected $_blResult;
    protected $_sPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKBLOCKITEMSOK';
    protected $_sNotPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKBLOCKITEMSNOK';
    protected $_sCheckDescML = 'D3_CFG_MOD_INSTALLCHECKBLOCKITEMS_DESC';
    protected $_blPassed = null;
    protected $_aDetails;
    protected $_blForceError = false;

    /**
     * @param d3_cfg_mod $_oSet
     */
    public function __construct(protected d3_cfg_mod $_oSet)
    {
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasCheckPassed()
    {
        $sMetaModuleId = $this->_oSet->getMetaModuleId();

        if ($this->_blPassed === null) {
            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                startProfile(__METHOD__);
            }
            $this->_blPassed = true;
            if ($sMetaModuleId) {
                /** @var Module $oModule */
                $oModule = oxNew(Module::class);
                $oModule->load($sMetaModuleId);

                if (is_array($oModule->getInfo('blocks'))) {
                    $this->_blPassed = $this->_checkAllBlockItemsExist($oModule->getInfo('blocks'), $sMetaModuleId);
                }
            }
            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                stopProfile(__METHOD__);
            }
        }

        return $this->_blPassed;
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getCheckMessageMultilangItem()
    {
        if ($this->hasCheckPassed()) {
            return $this->_sPassedCheckML;
        }

        return $this->_sNotPassedCheckML;
    }

    /**
     * @param $aBlockExtensions
     * @param $sModuleId
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    protected function _checkAllBlockItemsExist($aBlockExtensions, $sModuleId)
    {
        $aBlockExtensions = $this->_setErrorCase($aBlockExtensions);

        if (count($aBlockExtensions) == $this->_getActiveModuleBlockCount($sModuleId)) {
            return true;
        }

        return false;
    }

    /**
     * @param $sModuleId
     *
     * @return int
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function _getActiveModuleBlockCount($sModuleId)
    {
        /** @var Shop $shop */
        $shop = Registry::getConfig()->getActiveShop();
        $oQB = ContainerFactory::getInstance()->getContainer()->get(QueryBuilderFactoryInterface::class)->create();
        $oQB->select('count(*)')
            ->from('oxtplblocks')
            ->where('oxmodule = '.$oQB->createNamedParameter($sModuleId))
            ->andWhere('oxactive = '.$oQB->createNamedParameter(1, ParameterType::INTEGER))
            ->andWhere('oxshopid = '.$oQB->createNamedParameter($shop->getId()))
            ->setMaxResults(1);

        return (int) $oQB->execute()->fetchOne();
    }

    /**
     * @return string
     */
    public function getCheckDescMultiLangItem()
    {
        return $this->_sCheckDescML;
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getDetails()
    {
        if (false == $this->hasCheckPassed()) {
            if ($this->_aDetails == null) {
                $aMissingBlocks = [];
                $sMetaModuleId = $this->_oSet->getMetaModuleId();

                if ($sMetaModuleId) {
                    /** @var Module $oModule */
                    $oModule = oxNew(Module::class);
                    $oModule->load($sMetaModuleId);
                    $aMetaBlocks = $oModule->getInfo('blocks');

                    $aMissingBlocks = $this->_getMissingBlockList($sMetaModuleId, $aMetaBlocks, $aMissingBlocks);
                }

                $this->_aDetails = $aMissingBlocks;
            }
        }

        return $this->_aDetails;
    }

    /**
     * @param $sModuleId
     *
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function _getActiveModuleBlocks($sModuleId)
    {
        /** @var Shop $shop */
        $shop = Registry::getConfig()->getActiveShop();
        $oQB = ContainerFactory::getInstance()->getContainer()->get(QueryBuilderFactoryInterface::class)->create();
        $oQB->select('oxfile')
            ->from('oxtplblocks')
            ->where('oxmodule = '.$oQB->createNamedParameter($sModuleId))
            ->andWhere('oxactive = '.$oQB->createNamedParameter(1, ParameterType::INTEGER))
            ->andWhere('oxshopid = '.$oQB->createNamedParameter($shop->getId()));

        return $oQB->execute()->fetchAllAssociative();
    }

    /**
     * @param $sMetaModuleId
     * @param $aMetaBlocks
     * @param $aMissingBlocks
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _getMissingBlockList($sMetaModuleId, $aMetaBlocks, $aMissingBlocks)
    {
        $aMetaBlocks = $this->_getNonAvailableMetaBlocks($sMetaModuleId, $aMetaBlocks);

        foreach ($aMetaBlocks as $aMetaBlock) {
            $aMissingBlocks[] = $aMetaBlock['file'];
        }

        return $aMissingBlocks;
    }

    /**
     * @param $sMetaModuleId
     * @param $aMetaBlocks
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _getNonAvailableMetaBlocks($sMetaModuleId, $aMetaBlocks)
    {
        $aMetaBlocks = $this->_setErrorCase($aMetaBlocks);

        foreach ($this->_getActiveModuleBlocks($sMetaModuleId) as $aBlockFile) {
            $aBlockFile = array_change_key_case($aBlockFile, CASE_UPPER);
            foreach ($aMetaBlocks as $sKey => $aMetaBlock) {
                if ($aMetaBlock['file'] == $aBlockFile['OXFILE']) {
                    unset($aMetaBlocks[$sKey]);
                }
            }
        }

        return $aMetaBlocks;
    }

    /**
     * @param array $aMetaBlocks
     *
     * @return array
     */
    protected function _setErrorCase($aMetaBlocks)
    {
        if ($this->_blForceError) {
            $aMetaBlocks[] = ['template' => 'org.tpl', 'block' => 'myBlock', 'file' => 'myfolder/file.tpl'];
        }

        return $aMetaBlocks;
    }
}
