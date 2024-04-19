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

use Exception;
use OxidEsales\Eshop\Core\Exception\StandardException;

class wrongModIdException extends StandardException
{
    public function __construct($sModId = "not set", $iCode = 0, Exception $previous = null)
    {
        $sMessage = 'wrong or unknown module ID: '.$sModId;
        parent::__construct($sMessage, $iCode, $previous);
    }
}
