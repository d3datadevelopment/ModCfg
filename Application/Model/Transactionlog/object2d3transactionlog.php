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

namespace D3\ModCfg\Application\Model\Transactionlog;

use OxidEsales\Eshop\Core\Model\BaseModel;

/**
 * @deprecated
 */
class object2d3transactionlog extends BaseModel
{
    protected $_sCoreTable = 'd3_d3log_oxobject2d3transactionlog';

    /**
     * Initializes table
     */
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }
}
