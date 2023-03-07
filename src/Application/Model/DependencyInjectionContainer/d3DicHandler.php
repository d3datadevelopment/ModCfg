<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\DependencyInjectionContainer;

use D3\DIContainerHandler\d3DicHandler as externalDICHandler;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @deprecated use D3\DIContainerHandler\d3DicHandler
 */
class d3DicHandler implements d3DicHandlerInterface
{
    /**
     * get instance
     * @return   ContainerBuilder
     */
    public static function getInstance()
    {
        return externalDICHandler::getInstance();
    }

    /**
     * get instance
     * @return   ContainerBuilder
     */
    public static function getUncompiledInstance()
    {
        return externalDICHandler::getUncompiledInstance();
    }

    public static function removeInstance()
    {
        externalDICHandler::removeInstance();
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
