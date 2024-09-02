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

use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\Eshop\Core\Exception\StandardException;

/**
 * Smarty function
 * -------------------------------------------------------------
 * Purpose: Output core class object
 * add [{d3getobject type="\OxidEsales\Eshop\Application\Model\Category" ident="abc123" field="oxtitle" assign="oCategory"}] where you want to display content
 * -------------------------------------------------------------
 *
 * @param $params
 * @param $smarty \Smarty
 *
 * @return BaseModel|null
 * @throws StandardException
 */
function smarty_function_d3getobject($params, &$smarty)
{
    $sIdent  = $params['ident'] ?? '';
    $sType   = $params['type'] ?? '';
    $sField  = $params['field'] ?? '';
    $sAssign = $params['assign'] ?? '';

    if (! $sType) {
        throw new StandardException('You need to define an object type! Use type="myClass".');
    }

    $oObject = oxNew($sType);

    if (! empty($sIdent) && ! $oObject->Load($sIdent)) {
        throw new StandardException("couldn't load ident: $sIdent");
    }

    if ($sField) {
        $mRet = $oObject->getFieldData($sField);
    } else {
        $mRet = $oObject;
    }

    if ($sAssign) {
        $smarty->assign($sAssign, $mRet);
        return null;
    }

    return $mRet;
}
