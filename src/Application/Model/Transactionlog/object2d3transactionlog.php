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
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Transactionlog;

use OxidEsales\Eshop\Core\Model\BaseModel;

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
