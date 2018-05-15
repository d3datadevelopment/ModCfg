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
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Filegenerator;

use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use OxidEsales\Eshop\Core\Exception\StandardException;

class d3filegeneratorcronsh extends d3filegenerator
{
    protected $_sContentNameBaseKey = 'D3_SHGENERATOR_CRON_';
    protected $_sScriptPath;
    protected $_aSortedParameterList = array();

    protected $_aContentList = array(
        'standard'              => 'd3shpattern_cron_standard.tpl',
        'profihost_php56'       => 'd3shpattern_cron_profihost56.tpl',
        'profihost_php70'       => 'd3shpattern_cron_profihost70.tpl',
        'profihost_php71'       => 'd3shpattern_cron_profihost71.tpl',
        'profihost_php72'       => 'd3shpattern_cron_profihost72.tpl',
        'hetzner_php56_cgi'     => 'd3shpattern_cron_hetzner56cgi.tpl',
        'hetzner_php70_cgi'     => 'd3shpattern_cron_hetzner70cgi.tpl',
        'hetzner_php56_cli'     => 'd3shpattern_cron_hetzner56cli.tpl',
        'hetzner_php70_cli'     => 'd3shpattern_cron_hetzner70cli.tpl',
        'domainfactory_php56'   => 'd3shpattern_cron_domainfactory56.tpl',
        'domainfactory_php70'   => 'd3shpattern_cron_domainfactory70.tpl',
        'mittwald'              => 'd3shpattern_cron_mittwald.tpl',
    );

    /**
     * @param $sPath
     */
    public function setScriptPath($sPath)
    {
        $this->_sScriptPath = $sPath;
    }

    /**
     * @param array $aParameterList
     */
    public function setSortedParameterList(array $aParameterList)
    {
        ksort($aParameterList);
        $this->_aSortedParameterList = $aParameterList;
    }

    /**
     * @return \Smarty
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    protected function _configureSmarty()
    {
        $oSmarty = parent::_configureSmarty();

        $oSmarty->assign('sPHPInterpreterPath', $this->getPHPInterpreterPath());
        if ($this->_sScriptPath) {
            $oSmarty->assign('sScriptPath', $this->_sScriptPath);
        }
        if ($this->_aSortedParameterList) {
            $oSmarty->assign('aParameters', $this->_aSortedParameterList);
        }

        return $oSmarty;
    }
}
