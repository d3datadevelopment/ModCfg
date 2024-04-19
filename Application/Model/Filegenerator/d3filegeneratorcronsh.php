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
                'sPHPInterpreterPath'   => $this->getPHPInterpreterPath(),
                'sScriptPath'           => $this->_sScriptPath ?: null,
                'aParameters'           => $this->_aSortedParameterList ?: null,
            ]
        );
    }
}
