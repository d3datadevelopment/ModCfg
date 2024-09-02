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
