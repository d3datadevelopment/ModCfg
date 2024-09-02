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

namespace D3\ModCfg\Application\Controller\Admin\TPLBlocks;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_;

class d3tplblocks extends d3_cfg_mod_
{
    protected $_hasListItems = true;

    /**
     * @return string
     */
    public function render()
    {
        $this->addTplParam('sListClass', d3tplblocks_list::class);
        $this->addTplParam('sMainClass', d3tplblocks_main::class);
        return parent::render();
    }
}
