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

namespace D3\ModCfg\Application\Controller\Admin\Maintenance;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_;

/**
 * Class d3modlib
 */
class d3cleartmp_frame extends d3_cfg_mod_
{
    protected $_hasListItems = false;

    /**
     * @return string
     */
    public function render()
    {
        $this->addTplParam('sListClass', d3cleartmp_list::class);
        $this->addTplParam('sMainClass', d3cleartmp::class);
        return parent::render();
    }
}
