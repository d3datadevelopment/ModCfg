<?php

namespace D3\ModCfg\Application\Model\Transactionlog\Reader;

/**
 * Class d3_d3log_models_transactionlog_reader_abstract
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
