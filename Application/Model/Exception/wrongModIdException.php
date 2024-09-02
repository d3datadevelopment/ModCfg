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
