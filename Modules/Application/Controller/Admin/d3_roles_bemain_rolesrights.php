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

namespace D3\ModCfg\Modules\Application\Controller\Admin;

use DOMDocument;
use DOMElement;

class d3_roles_bemain_rolesrights extends d3_roles_bemain_rolesrights_parent
{
    /**
     * @return string
     */
    public function render()
    {
        $sRet = parent::render();

        $domDocument = new DOMDocument();
        $oxiddoms = $this->getNavigation()->getDomXml()->documentElement->firstChild->childNodes;

        // fuege oxid bams hinzu
        foreach ($oxiddoms as $oxiddom) {
            $importNode =  $domDocument->importNode($oxiddom, true);
            $domDocument->appendChild($importNode);
        }

        $domBom = $this->getNavigation()->getDomXml()->documentElement->childNodes;
        /** @var DOMElement $oxmenu */
        foreach ($domBom as $oxmenu) {
            if ($oxmenu->hasAttributes()) {
                if ($oxmenu->getAttribute('id') == 'd3mxd3modules') {
                    $importNode =  $domDocument->importNode($oxmenu, true);
                    $domDocument->appendChild($importNode);
                }
            }
        }

        //ueberschreibe oxid bams
        $this->addTplParam('adminmenu', $domDocument->childNodes);

        return $sRet;
    }
}
