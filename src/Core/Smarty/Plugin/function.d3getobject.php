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
 * @author    D3 Data Development - Ray Ehrhardt <re@shopmodule.com>
 * @link      http://www.oxidmodule.com
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
 * @return BaseModel
 * @throws StandardException
 */
function smarty_function_d3getobject( $params, &$smarty )
{
    $sIdent  = isset( $params['ident'] ) ? $params['ident'] : '';
    $sType   = isset( $params['type'] ) ? $params['type'] : '';
    $sField  = isset( $params['field'] ) ? $params['field'] : '';
    $sAssign = isset( $params['assign'] ) ? $params['assign'] : '';

    $mRet = null;
    if(false == $sType) {
        throw new StandardException('You need to define an object type! Use type="myClass".');
    }

    $oObject = oxNew($sType);

    if(empty($sIdent) == false && $oObject->Load($sIdent) == false) {
        throw new StandardException("couldn't load ident: $sIdent");
    }

    if($sField) {
        $mRet = $oObject->getFieldData($sField);
    } else {
        $mRet = $oObject;
    }

    if($sAssign) {
        $smarty->assign($sAssign, $mRet);
    } else {
        return $mRet;
    }

    return null;
}
