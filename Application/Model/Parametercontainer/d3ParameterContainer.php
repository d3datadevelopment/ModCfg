<?php

/**
 * Copyright (c) D3 Data Development (Inh. Thomas Dartsch)
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <info@shopmodule.com>
 * @link      https://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Parametercontainer;

use D3\ModCfg\Application\Model\Exception\d3ParameterNotFoundException;

class d3ParameterContainer implements d3ParameterContainerInterface
{
    protected $aParameters = [];

    /**
     * Constructor.
     * @param array $aParameters An array of parameters
     */
    public function __construct(array $aParameters = [])
    {
        $this->add($aParameters);
    }

    /**
     * Clears all parameters.
     */
    public function clear()
    {
        $this->aParameters = [];
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
