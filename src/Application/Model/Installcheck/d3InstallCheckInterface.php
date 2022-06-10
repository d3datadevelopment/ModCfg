<?php

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
