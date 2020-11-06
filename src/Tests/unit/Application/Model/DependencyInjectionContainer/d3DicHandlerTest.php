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

namespace D3\ModCfg\Tests\unit\Application\Model\DependencyInjectionContainer;

use D3\ModCfg\Application\Model\DependencyInjectionContainer\d3DicHandler;
use D3\ModCfg\Tests\unit\d3ModCfgUnitTestCase;
use org\bovigo\vfs\vfsStream;
use OxidEsales\Eshop\Core\Config;
use ReflectionException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

define('D3_MODCFG_TEST', true);

/**
 * Class d3DicHandlerTest
 */
class d3DicHandlerTest extends d3ModCfgUnitTestCase
{
    /** @var d3DicHandler */
    protected $_oModel;

    /**
     * setup basic requirements
     */
    public function setUp()
    {
        parent::setUp();

        $this->_oModel = oxNew(d3DicHandler::class);
    }

    public function tearDown()
    {
        parent::tearDown();

        unset($this->_oModel);
    }

    /**
     * @test
     */
    public function getInstanceStaticWillReturnRightInstance()
    {
        $this->assertInstanceOf(ContainerBuilder::class, d3DicHandler::getInstance());
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getConfigWillReturnRightInstance()
    {
        $this->assertInstanceOf(Config::class, $this->callMethod($this->_oModel, 'd3GetConfig'));
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getCacheFilePathPass()
    {
        $sPath = $this->callMethod($this->_oModel, 'd3GetCacheFilePath');

        $this->assertInternalType('string', $sPath);
        $this->assertTrue((bool) strlen($sPath));
        $this->assertStringEndsWith('.php', $sPath);
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getCacheContainerPass()
    {
        $structure = ['test_directory' => []];
        vfsStream::setup();
        $fsRoot = vfsStream::create($structure);
        $fsTestDirectory = $fsRoot->getChild('test_directory');
        $exportfile_mock = vfsStream::newFile('filename.ext')->setContent('<?php class d3CacheContainer {}')->at($fsTestDirectory);

        /** @var d3DicHandler|\PHPUnit_Framework_MockObject_MockObject $oDICHandlerMock */
        $oDICHandlerMock = $this->getMock(d3DicHandler::class,
            array('d3GetCacheFilePath')
        );
        $oDICHandlerMock->expects($this->once())->method('d3GetCacheFilePath')->willReturn($exportfile_mock->url());

        $this->_oModel = $oDICHandlerMock;

        $oCacheContainer = $this->callMethod($this->_oModel, 'd3GetCacheContainer');

        $this->assertInstanceOf('d3CacheContainer', $oCacheContainer);
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function loadFilesPass()
    {
        $oContainer = $this->_oModel->getContainerBuilder();

        /** @var YamlFileLoader|\PHPUnit_Framework_MockObject_MockObject $oLoaderMock */
        $oLoaderMock = $this->getMock(YamlFileLoader::class,
            array('load'),
            array(
                $oContainer,
                oxNew(FileLocator::class, $this->_oModel->d3GetConfig()->getModulesDir())
            )
        );
        $oLoaderMock->expects($this->exactly(2))->method('load');

        /** @var d3DicHandler|\PHPUnit_Framework_MockObject_MockObject $oDICHandlerMock */
        $oDICHandlerMock = $this->getMock(d3DicHandler::class,
            array('d3GetFileLoader', 'getShopDefinitionFiles')
        );
        $oDICHandlerMock->expects($this->once())->method('d3GetFileLoader')->willReturn($oLoaderMock);
        $oDICHandlerMock->expects($this->once())->method('getShopDefinitionFiles')->willReturn(
            array(
                'd3/modcfg/Config/services.yaml',
                'd3/modcfg/Config/services.yaml',
            )
        );

        $this->_oModel = $oDICHandlerMock;

        $this->callMethod($this->_oModel, 'loadFiles', array($oContainer));
    }

    public function getFileLoaderPass()
    {
        $oContainer = $this->_oModel->getContainerBuilder();

        $oFileLoader = $this->callMethod($this->_oModel, 'd3GetFileLoader', array($oContainer));

        $this->assertInstanceOf(YamlFileLoader::class, $oFileLoader);
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function buildContainerProductive()
    {
        $structure = ['test_directory' => ['test.file' => '']];
        vfsStream::setup();
        $fsRoot = vfsStream::create($structure);
        $fsTestDirectory = $fsRoot->getChild('test_directory');
        $exportfile_mock = vfsStream::newFile('filename.ext')->setContent('testContent')->at($fsTestDirectory);

        /** @var Config|\PHPUnit_Framework_MockObject_MockObject $oConfigMock */
        $oConfigMock = $this->getMock(Config::class, array('isProductiveMode'));
        $oConfigMock->method('isProductiveMode')->willReturn(true);
        $oConfigMock->setConfigParam('iDebug', 0);

        /** @var d3DicHandler|\PHPUnit_Framework_MockObject_MockObject $oDICHandlerMock */
        $oDICHandlerMock = $this->getMock(d3DicHandler::class,
            array('d3GetConfig', 'd3GetCacheFilePath', 'd3GetCacheContainer', 'getContainerBuilder')
        );
        $oDICHandlerMock->method('d3GetConfig')->willReturn($oConfigMock);
        $oDICHandlerMock->method('d3GetCacheFilePath')->willReturn($exportfile_mock->url());
        $oDICHandlerMock->expects($this->once())->method('d3GetCacheContainer')->willReturn(true);
        $oDICHandlerMock->expects($this->never())->method('getContainerBuilder')->willReturn(true);

        $this->_oModel = $oDICHandlerMock;

        $this->callMethod($this->_oModel, 'buildContainer');
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function buildContainerNoProductive()
    {
        /** @var Config|\PHPUnit_Framework_MockObject_MockObject $oConfigMock */
        $oConfigMock = $this->getMock(Config::class, array('isProductiveMode'));
        $oConfigMock->method('isProductiveMode')->willReturn(false);
        $oConfigMock->setConfigParam('iDebug', 0);

        /** @var d3DicHandler|\PHPUnit_Framework_MockObject_MockObject $oDICHandlerMock */
        $oDICHandlerMock = $this->getMock(d3DicHandler::class,
            array('d3GetConfig', 'd3GetCacheFilePath', 'd3GetCacheContainer', 'loadFiles')
        );
        $oDICHandlerMock->method('d3GetConfig')->willReturn($oConfigMock);
        $oDICHandlerMock->method('d3GetCacheFilePath')->willReturn(true);
        $oDICHandlerMock->expects($this->never())->method('d3GetCacheContainer')->willReturn(true);
        $oDICHandlerMock->expects($this->once())->method('loadFiles')->willReturn(true);

        $this->_oModel = $oDICHandlerMock;

        $this->callMethod($this->_oModel, 'buildContainer');
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function buildContainerDebug()
    {
        /** @var Config|\PHPUnit_Framework_MockObject_MockObject $oConfigMock */
        $oConfigMock = $this->getMock(Config::class, array('isProductiveMode'));
        $oConfigMock->method('isProductiveMode')->willReturn(true);
        $oConfigMock->setConfigParam('iDebug', 1);

        /** @var d3DicHandler|\PHPUnit_Framework_MockObject_MockObject $oDICHandlerMock */
        $oDICHandlerMock = $this->getMock(d3DicHandler::class,
            array('d3GetConfig', 'd3GetCacheFilePath', 'd3GetCacheContainer', 'loadFiles')
        );
        $oDICHandlerMock->method('d3GetConfig')->willReturn($oConfigMock);
        $oDICHandlerMock->method('d3GetCacheFilePath')->willReturn(true);
        $oDICHandlerMock->expects($this->never())->method('d3GetCacheContainer')->willReturn(true);
        $oDICHandlerMock->expects($this->once())->method('loadFiles')->willReturn(true);

        $this->_oModel = $oDICHandlerMock;

        $this->callMethod($this->_oModel, 'buildContainer');
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function buildContainerCacheFileMissing()
    {
        /** @var Config|\PHPUnit_Framework_MockObject_MockObject $oConfigMock */
        $oConfigMock = $this->getMock(Config::class, array('isProductiveMode'));
        $oConfigMock->method('isProductiveMode')->willReturn(true);
        $oConfigMock->setConfigParam('iDebug', 0);

        /** @var d3DicHandler|\PHPUnit_Framework_MockObject_MockObject $oDICHandlerMock */
        $oDICHandlerMock = $this->getMock(d3DicHandler::class,
            array('d3GetConfig', 'd3GetCacheFilePath', 'd3GetCacheContainer', 'loadFiles')
        );
        $oDICHandlerMock->method('d3GetConfig')->willReturn($oConfigMock);
        $oDICHandlerMock->method('d3GetCacheFilePath')->willReturn(true);
        $oDICHandlerMock->expects($this->never())->method('d3GetCacheContainer')->willReturn(true);
        $oDICHandlerMock->expects($this->once())->method('loadFiles')->willReturn(true);

        $this->_oModel = $oDICHandlerMock;

        $this->callMethod($this->_oModel, 'buildContainer');
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getContainerBuilderReturnsRightInstance()
    {
        $this->assertInstanceOf(ContainerBuilder::class, $this->callMethod($this->_oModel, 'getContainerBuilder'));
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getShopDefinitionFilesPass()
    {
        /** @var d3DicHandler|\PHPUnit_Framework_MockObject_MockObject $oDICHandlerMock */
        $oDICHandlerMock = $this->getMock(d3DicHandler::class,
            array('getDefinitionFiles')
        );
        $oDICHandlerMock->expects($this->once())->method('getDefinitionFiles')->willReturn(true);

        $this->_oModel = $oDICHandlerMock;

        $this->callMethod($this->_oModel, 'getShopDefinitionFiles');
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getDefinitionFilesPass()
    {
        $aFileList = $this->callMethod($this->_oModel, 'getDefinitionFiles', array('d3DICDefinitionFiles'));

        $this->assertInternalType('array', $aFileList);
        $this->assertTrue(count($aFileList) > 0);
        $this->assertContains('d3/modcfg/Config/services.yaml', $aFileList);
    }
}
