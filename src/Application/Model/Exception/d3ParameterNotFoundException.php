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

namespace D3\ModCfg\Application\Model\Exception;

use OxidEsales\Eshop\Core\Exception\StandardException;

class d3ParameterNotFoundException extends StandardException
{
    public $sKey;

    /**
     * @param string $sKey
     * @param int    $iCode
     */
    public function __construct($sKey, $iCode = 0)
    {
        $this->sKey = $sKey;

        parent::__construct($sKey . ' not set', $iCode);
    }
}
