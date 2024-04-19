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

namespace D3\ModCfg\Application\Model\Installcheck;

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;

/**
 * Interface d3InstallCheckInterface
 */
interface d3InstallCheckInterface
{
    /**
     * @param d3_cfg_mod $oSet
     */
    public function __construct(d3_cfg_mod $oSet);

    public function hasCheckPassed();

    public function getCheckMessageMultilangItem();

    public function getCheckDescMultiLangItem();

    public function getDetails();
}
