<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

declare(strict_types=1);

namespace D3\ModCfg\Application\Model\Maintenance\Actions;

use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;

abstract class AbstractClearImagesAction extends AbstractAction
{
    /**
     * @return int
     */
    public function getAffectedRows(): int
    {
        return 0;
    }

    /**
     * @return d3clrtmp
     */
    protected function getClrTmp(): d3clrtmp
    {
        return oxNew(d3clrtmp::class);
    }
}
