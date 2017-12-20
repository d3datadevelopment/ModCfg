<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development, Thomas Dartsch
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Config;

class d3_oxtheme_modcfg extends d3_oxtheme_modcfg_parent
{
    /**
     * @return string
     */
    public function d3GetParentThemeId()
    {
        $sId = $this->getActiveThemeId();
        $sParent = $sId;

        if ($this->load($this->getActiveThemeId())) {
            $sParent = $this->getInfo('parentTheme') ? $this->getInfo('parentTheme') : $this->getId();
        };

        return strtolower($sParent);
    }

    /**
     * @param $aMetaModuleIds
     * @return string
     */
    public function d3GetMappedThemeId($aMetaModuleIds)
    {
        $aDefaultThemes = array('flow', 'mobile', 'azure');

        foreach ($aMetaModuleIds as $sModuleId) {
            foreach ($aDefaultThemes as $sDefaultThemeId) {
                $sParentThemeId = $this->d3GetParentThemeId();
                if ($sDefaultThemeId == $sParentThemeId
                    || $this->d3getThemeMapping($sDefaultThemeId, $sModuleId) == $sParentThemeId
                ) {
                    return $sDefaultThemeId;
                }
            }
        }

        return 'azure';
    }

    /**
     * @param $sDefaultTheme
     * @param $sModuleId
     * @return string
     */
    public function d3getThemeMapping($sDefaultTheme, $sModuleId)
    {
        $sConfVar = 'd3custParentThemeMappedTo'.ucfirst($sDefaultTheme).'_'.$sModuleId;
        return trim(
            strtolower(
                Registry::getConfig()->getShopConfVar($sConfVar, null, Config::OXMODULE_MODULE_PREFIX.$sModuleId)
            )
        );
    }

    /**
     * @param $sParentThemeId
     * @param $aMetaModuleIds
     * @return bool
     */
    public function d3IsThemeIdMappedTo($sParentThemeId, $aMetaModuleIds)
    {
        return $this->d3GetMappedThemeId($aMetaModuleIds) == strtolower($sParentThemeId);
    }
}