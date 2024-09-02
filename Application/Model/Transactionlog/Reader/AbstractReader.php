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

namespace D3\ModCfg\Application\Model\Transactionlog\Reader;

/**
 * Class d3_d3log_models_transactionlog_reader_abstract
 * @deprecated
 */
abstract class AbstractReader
{
    /**
     * @param $transactionData
     *
     * @return mixed
     */
    abstract public function read($transactionData);
}
