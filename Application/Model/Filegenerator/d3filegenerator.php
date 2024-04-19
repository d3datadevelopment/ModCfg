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

namespace D3\ModCfg\Application\Model\Filegenerator;

use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Templating\TemplateRenderer;
use OxidEsales\EshopCommunity\Internal\Framework\Templating\TemplateRendererBridgeInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class d3filegenerator
{
    protected array $_aContentList = [];

    protected ?string $_sContentType = null;
    protected string $_sContentNameBaseKey = 'D3_FILEGENERATOR_';

    /**
     * @return array
     */
    public function getContentList(): array
    {
        $aContentList = [];

        foreach (array_keys($this->_aContentList) as $sKey) {
            $aContentList[$sKey] = $this->_translateContentName($sKey);
        }

        return $aContentList;
    }

    /**
     * @param string $sType
     *
     * @return bool
     */
    public function isInContentList(string $sType): bool
    {
        return in_array($sType, array_keys($this->_aContentList));
    }

    /**
     * @param string $sType
     * @param string $sTemplateName
     */
    public function addToContentList(string $sType, string $sTemplateName): void
    {
        $this->_aContentList[$sType] = $sTemplateName;
        $this->setContentType($sType);
    }

    /**
     * @param string $sType
     */
    public function removeFromContentList(string $sType): void
    {
        if ($this->isInContentList($sType)) {
            unset($this->_aContentList[$sType]);
        }
    }

    /**
     * @param string $sContentType
     */
    public function setContentType(string $sContentType): void
    {
        $this->_sContentType = $sContentType;
    }

    /**
     * @param string $sKey
     *
     * @return string
     */
    protected function _translateContentName(string $sKey): string
    {
        return Registry::getLang()->translateString($this->_sContentNameBaseKey.strtoupper($sKey), null, 1);
    }

    /**
     * @param string $sDownloadFileName
     *
     * @throws ContainerExceptionInterface
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws NotFoundExceptionInterface
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function startDownload(string $sDownloadFileName): void
    {
        $sContent = $this->_getFileContent();

        /** @var d3filesystem $oD3FS */
        $oD3FS = oxNew(d3filesystem::class);
        $oD3FS->startDirectDownload($sDownloadFileName, $sContent);
    }

    /**
     * @param string   $sFilePath
     * @param bool     $blOverwrite
     * @param int|null $sChmod
     *
     * @return bool
     * @throws ContainerExceptionInterface
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws NotFoundExceptionInterface
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function createFile(string $sFilePath, bool $blOverwrite = true, int $sChmod = null): bool
    {
        $sContent = $this->_getFileContent();

        /** @var d3filesystem $oD3FS */
        $oD3FS = oxNew(d3filesystem::class);
        return $oD3FS->createFile($sFilePath, $sContent, $blOverwrite, $sChmod);
    }

    /**
     * @return string
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws StandardException
     */
    protected function _getFileContent(): string
    {
        if (! $this->isInContentList($this->_sContentType)) {
            /** @var StandardException $oException */
            $oException = oxNew(StandardException::class, 'no valid content source set');
            throw($oException);
        }

        $templateRenderer = $this->getTemplateRenderer();

        $sTemplate = $this->_aContentList[$this->_sContentType];
        return $templateRenderer->renderTemplate($sTemplate, $this->getContext());
    }

    /**
     * @return TemplateRenderer
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getTemplateRenderer(): TemplateRenderer
    {
        return ContainerFactory::getInstance()->getContainer()
            ->get(TemplateRendererBridgeInterface::class)
            ->getTemplateRenderer();
    }

    protected function getContext(): array
    {
        return [
            'oShop' => Registry::getConfig()->getActiveShop(),
            'oConfig'   => Registry::getConfig(),
            'oViewConf' => Registry::getConfig()->getActiveView()->getViewConfig(),
        ];
    }

    /**
     * @return string
     */
    public function getPHPInterpreterPath(): string
    {
        return PHP_BINDIR;
    }
}
