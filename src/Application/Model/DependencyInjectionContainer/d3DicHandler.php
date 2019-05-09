<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\DependencyInjectionContainer;

use d3CacheContainer;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Module\ModuleList;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Facts\Config\ConfigFile;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class d3DicHandler implements d3DicHandlerInterface
{
    /**
     * instance
     * @var array
     */
    protected static $_instance;

    public static $circularReferenceMethodNames = array(
        'getViewConfig'
    );

    /**
     * get instance
     * @return   ContainerBuilder
     */
    public static function getInstance()
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $caller = $trace[1];
        $functionName = $caller['function'];

        if (in_array(strtolower($functionName), array_map('strtolower', self::$circularReferenceMethodNames)))
        {
            throw oxNew(\Exception::class, 'method '.$functionName." can't use DIC due the danger of circular reference");
        }

        if (null == self::$_instance) {
            $oDicHandler = oxNew(d3DicHandler::class);
            self::$_instance = $oDicHandler->buildContainer();
        }

        return self::$_instance;
    }

    /**
     * @return mixed
     */
    public function d3GetConfig()
    {
        return Registry::getConfig();
    }

    public function d3GetCacheFilePath()
    {
        return $this->d3GetConfig()->getConfigParam('sCompileDir').'/d3DicContainer.php';
    }

    /**
     * @return d3CacheContainer|object
     */
    public function d3GetCacheContainer()
    {
        require_once $this->d3GetCacheFilePath();
        return oxNew(d3CacheContainer::class);
    }

    /**
     * @param $container
     * @return YamlFileLoader
     */
    public function d3GetFileLoader($container)
    {
        return oxNew(YamlFileLoader::class,
            $container,
            oxNew(FileLocator::class, $this->d3GetConfig()->getModulesDir())
        );
    }

    /**
     * @param $container
     */
    public function loadFiles($container)
    {
        $loader = $this->d3GetFileLoader($container);

        foreach ($this->getShopDefinitionFiles() as $file) {
            $fullPath = $this->d3GetConfig()->getModulesDir().$file;
            if (is_file($fullPath)) {
                $loader->load($file);
            }
        }
    }

    /**
     * @return ContainerBuilder
     */
    public function buildContainer()
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile(__METHOD__);

        $config = $this->d3GetConfig();

        if ($config->isProductiveMode()
            && false == $config->getConfigParam('iDebug')
            && (false == defined('OXID_PHP_UNIT') || true == defined('D3_MODCFG_TEST'))
            && file_exists($this->d3GetCacheFilePath())
        ) {
            $container = $this->d3GetCacheContainer();
        } else {
            $container = $this->getContainerBuilder();
            $this->loadFiles($container);

            if (false == defined('OXID_PHP_UNIT')) {
                $dumper = new PhpDumper($container);
                file_put_contents($this->d3GetCacheFilePath(), $dumper->dump(array('class' => 'd3CacheContainer')));
            }
        }

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile(__METHOD__);

        return $container;
    }

    public function getContainerBuilder()
    {
        return oxNew(ContainerBuilder::class);
    }

    /**
     * @return array
     */
    public function getShopDefinitionFiles()
    {
        return $this->getDefinitionFiles('d3DICDefinitionFiles');
    }

    /**
     * @param $sMetaDataIdent
     * @return array
     */
    public function getDefinitionFiles($sMetaDataIdent)
    {
        $aDICDefintionFileList = [];

        /** @var ModuleList $oModuleList */
        $oModuleList = oxNew(ModuleList::class);
        foreach (array_keys($oModuleList->getActiveModuleInfo()) as $sModuleId) {
            $oModule = oxNew(Module::class);
            $oModule->load($sModuleId);
            $aDICDefintionFiles = $oModule->getInfo($sMetaDataIdent);
            if (isset($aDICDefintionFiles) && is_array($aDICDefintionFiles)) {
                $aDICDefintionFileList = array_merge($aDICDefintionFileList, $aDICDefintionFiles);
            }
        }

        $aBaseServiceIds = array(
            'd3/modcfg'
        );

        $aDefFileList = array();

        foreach ($aDICDefintionFileList as $sKey => $sFileName) {
            foreach ($aBaseServiceIds as $sBaseKey => $sBaseClass) {
                if (strstr(strtolower($sFileName), strtolower($sBaseClass))) {
                    $aDefFileList[$sBaseKey] = $sFileName;
                    unset($aDICDefintionFileList[$sKey]);
                }
            }
        }

        ksort($aDefFileList, SORT_NUMERIC);
        $aDefFileList = array_merge($aDefFileList, $aDICDefintionFileList);

        return $aDefFileList;
    }

    /**
     * clone
     */
    public function __clone() {}

    /**
     * constructor
     */
    public function __construct() {}
}
