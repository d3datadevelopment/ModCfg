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

use D3\ModCfg\Application\Model\d3bit;
use D3\ModCfg\Application\Model\d3bitmask;
use D3\ModCfg\Application\Model\DependencyInjectionContainer\d3DicHandler;
use D3\ModCfg\Application\Model\DependencyInjectionContainer\d3DicUtilities;
use D3\ModCfg\Tests\unit\d3ModCfgUnitTestCase;
use org\bovigo\vfs\vfsStream;
use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\Config;
use ReflectionException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

define('D3_MODCFG_TEST', true);

/**
 * Class d3DicUtilitiesTest
 */
class d3DicUtilitiesTest extends d3ModCfgUnitTestCase
{
    /** @var d3DicUtilities */
    protected $_oModel;

    /**
     * setup basic requirements
     */
    public function setUp() : void
    {
        parent::setUp();

        $this->_oModel = oxNew(d3DicUtilities::class);
    }

    public function tearDown() : void
    {
        parent::tearDown();

        unset($this->_oModel);
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function canGetServiceIdWithoutAdditional()
    {
        $this->assertSame(
            'oxidesales\eshop\application\model\article',
            $this->callMethod($this->_oModel, 'getServiceId', array(Article::class))
        );
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function canGetServiceIdWithAdditional()
    {
        $this->assertSame(
            'd3ox.additional.oxidesales\eshop\application\model\article',
            $this->callMethod($this->_oModel, 'getServiceId', array(Article::class, 'd3ox.additional'))
        );
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function canGetArgumentId()
    {
        $this->assertSame(
            'oxidesales\eshop\application\model\article.args.user',
            $this->callMethod($this->_oModel, 'getArgumentId', array(Article::class, 'user'))
        );
    }
}
