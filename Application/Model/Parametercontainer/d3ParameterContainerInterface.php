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

namespace D3\ModCfg\Application\Model\Parametercontainer;

use D3\ModCfg\Application\Model\Exception\d3ParameterNotFoundException;

interface d3ParameterContainerInterface
{
    /**
     * Clears all parameters.
     */
    public function clear();

    /**
     * Adds parameters to the service container parameters.
     * @param array $aParameters An array of parameters
     */
    public function add(array $aParameters);

    /**
     * Gets the service container parameters.
     * @return array An array of parameters
     */
    public function all();

    /**
     * Gets a container parameter.
     * @param string $sName The parameter name
     * @return mixed  The parameter value
     * @throws d3ParameterNotFoundException if the parameter is not defined
     */
    public function get($sName);

    /**
     * Sets a service container parameter.
     * @param string $sName  The parameter name
     * @param mixed  $mValue The parameter value
     */
    public function set($sName, $mValue);

    /**
     * Returns true if a parameter name is defined.
     * @param string $sName The parameter name
     * @return Boolean true if the parameter name is defined, false otherwise
     */
    public function has($sName);

    /**
     * @param $sName
     */
    public function remove($sName);
}
