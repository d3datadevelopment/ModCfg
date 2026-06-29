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

namespace D3\ModCfg\Application\Model\Filegenerator;

use D3\ModCfg\Application\Model\Constants;

class d3filegeneratorcronsh extends d3filegenerator
{
    protected string $_sContentNameBaseKey = 'D3_SHGENERATOR_CRON_';
    protected ?string $_sScriptPath = null;
    protected array $_aSortedParameterList = [];

    protected array $_aContentList = [
        'standard'              => '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_standard',
        'profihost_php80'       => '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_profihost80',
        'profihost_php81'       => '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_profihost81',
        'profihost_php82'       => '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_profihost82',
        'profihost_php83'       => '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_profihost83',
    ];

    /**
     * @param $sPath
     */
    public function setScriptPath($sPath): void
    {
        $this->_sScriptPath = $sPath;
    }

    /**
     * @param array $aParameterList
     */
    public function setSortedParameterList(array $aParameterList): void
    {
        ksort($aParameterList);
        $this->_aSortedParameterList = $aParameterList;
    }

    /**
     * @return array
     */
    public function getContext(): array
    {
        return array_merge(
            parent::getContext(),
            [
                'sPHPInterpreterPath'   => $this->quoteShellArgument($this->getPHPInterpreterPath()),
                'sScriptPath'           => $this->quoteShellArgument($this->_sScriptPath ?: ''),
                'aParameters'           => $this->quoteShellArguments($this->_aSortedParameterList ?: []),
            ]
        );
    }

    protected function quoteShellArgument(string $sValue): string
    {
        return escapeshellarg(str_replace(["\r", "\n"], '', $sValue));
    }

    /**
     * @param array $aParameters
     *
     * @return array
     */
    protected function quoteShellArguments(array $aParameters): array
    {
        return array_map(
            function ($sParameter) {
                return $this->quoteShellArgument((string) $sParameter);
            },
            $aParameters
        );
    }
}
