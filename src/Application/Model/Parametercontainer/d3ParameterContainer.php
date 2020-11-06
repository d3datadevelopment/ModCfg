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

use \D3\ModCfg\Application\Model\Exception\d3ParameterNotFoundException;

class d3ParameterContainer implements d3ParameterContainerInterface
{
    protected $aParameters = array();

    /**
     * Constructor.
     * @param array $aParameters An array of parameters
     */
    public function __construct(array $aParameters = array())
    {
        $this->add($aParameters);
    }

    /**
     * Clears all parameters.
     */
    public function clear()
    {
        $this->aParameters = array();
    }

    /**
     * Adds parameters to the service container parameters.
     * @param array $aParameters An array of parameters
     */
    public function add(array $aParameters)
    {
        foreach ($aParameters as $sKey => $mValue) {
            $this->set(strtolower($sKey), $mValue);
        }
    }

    /**
     * Gets the service container parameters.
     * @return array An array of parameters
     */
    public function all()
    {
        return $this->aParameters;
    }

    /**
     * Gets a service container parameter.
     * @param string $sName The parameter name
     * @return mixed  The parameter value
     * @throws d3ParameterNotFoundException if the parameter is not defined
     */
    public function get($sName)
    {
        $sName = strtolower($sName);

        if (false == array_key_exists($sName, $this->aParameters) ||
            false == $sName
        ) {
            throw new d3ParameterNotFoundException($sName);
        }

        return $this->aParameters[$sName];
    }

    /**
     * Sets a service container parameter.
     *
     * @param string $sName  The parameter name
     * @param mixed  $mValue The parameter value
     */
    public function set($sName, $mValue)
    {
        $this->aParameters[strtolower($sName)] = $mValue;
    }

    /**
     * Returns true if a parameter name is defined.
     * @param string $sName The parameter name
     * @return Boolean true if the parameter name is defined, false otherwise
     */
    public function has($sName)
    {
        return array_key_exists(strtolower($sName), $this->aParameters);
    }

    /**
     * Removes a parameter.
     *
     * @param string $sName The parameter name
     */
    public function remove($sName)
    {
        unset($this->aParameters[strtolower($sName)]);
    }
}
