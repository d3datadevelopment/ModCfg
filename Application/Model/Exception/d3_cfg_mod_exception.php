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

namespace D3\ModCfg\Application\Model\Exception;

use DateTimeImmutable;

/**
 * handle d3_cfg_mod specific exceptions
 */
class d3_cfg_mod_exception extends d3modprofile_exception
{
    protected $_sCompareData;

    /**
     * @return string
     */
    public function getString()
    {
        $sStr = self::class . " (time: " . (new DateTimeImmutable())->format('Y-m-d H:i:s')
            . "): [{$this->code}]: {$this->message} ";

        if ($this->getCompareData()) {
            $sStr .= "(".$this->getCompareData().") ";
        }

        $sStr .= "- Faulty ModCfg: " . $this->getModCfgId();
        //." \n Stack Trace: {$this->getTraceAsString()}\n\n";

        return $sStr;
    }

    /**
     * @param $sCompareData
     */
    public function setCompareData($sCompareData)
    {
        $this->_sCompareData = $sCompareData;
    }

    /**
     * @return mixed
     */
    public function getCompareData()
    {
        return $this->_sCompareData;
    }
}
