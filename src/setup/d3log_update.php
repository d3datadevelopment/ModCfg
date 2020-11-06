<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\ModCfg\setup;

use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbtable;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\ConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;

class d3log_update extends d3install_updatebase
{
    protected $_aUpdateMethods = array(
        array('check' => 'checkLogTableExist',
              'do'    => 'updateLogTableExist'),
        array('check' => 'checkLogTableEngine',
              'do'    => 'updateLogTableEngine'),
        array('check' => 'isTALogTableNotExisting',
              'do'    => 'updateTALogTableExist'),
        array('check' => 'hasOldTALogTable',
              'do'    => 'deleteOldTALogTable'),
        array('check' => 'checkTALogTableEngine',
              'do'    => 'updateTALogTableEngine'),
        array('check' => 'checkO2DLogTableExist',
              'do'    => 'updateO2DLogTableExist'),
        array('check' => 'checkO2DLogTableEngine',
              'do'    => 'updateO2DLogTableEngine'),
        array('check' => 'checkRenameFields',
              'do'    => 'fixRenameFields'),
        array('check' => 'checkDeleteFields',
              'do'    => 'fixDeleteFields'),
        array('check' => 'checkLogFields',
              'do'    => 'updateLogFields'),
        array('check' => 'checkLogIndizes',
              'do'    => 'updateLogIndizes'),
        array('check' => 'hasOldIndizes',
              'do'    => 'removeOldIndizes',),
    );

    protected $_oModCfg;

    protected $_sLib = 'd3log';

    protected $_sTblName = 'd3log';

    public $aFields = array(
        'OXID'                   => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXSHOPID'               => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXSHOPID',
            'sType'       => 'VARCHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXSESSID'               => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXSESSID',
            'sType'       => 'VARCHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXLOGTYPE'              => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXLOGTYPE',
            'sType'       => 'VARCHAR(15)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXCOUNTER'              => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXCOUNTER',
            'sType'       => 'INT(15)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => 'AUTO_INCREMENT UNIQUE',
            'blMultilang' => false,
        ),
        'OXTIME'                 => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXTIME',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'log time',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXMODID'                => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXMODID',
            'sType'       => 'VARCHAR(100)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXPROFILEID'            => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXPROFILEID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXCLASS'                => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXCLASS',
            'sType'       => 'VARCHAR(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXFNC'                  => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXFNC',
            'sType'       => 'VARCHAR(100)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXLINE'                 => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXLINE',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXACTION'               => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXACTION',
            'sType'       => 'VARCHAR(100)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXTEXT'                 => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXTEXT',
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXTIMESTAMP'            => array(
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'insert time',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_OXID'                => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_OXSHOPID'            => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXSHOPID',
            'sType'       => 'VARCHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_OXSESSID'            => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXSESSID',
            'sType'       => 'VARCHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'session identification',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_D3MODID'             => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3MODID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module id',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_D3PROFILEID'         => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3PROFILEID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile id',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_D3GROUP'             => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3GROUP',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'internal reference identification',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_D3REFERENCE'         => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3REFERENCE',
            'sType'       => 'VARCHAR(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'external transaction identifier',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_D3LOGNR'             => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3LOGNR',
            'sType'       => 'INT(15)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'internal counter',
            'sExtra'      => 'AUTO_INCREMENT',
            'blMultilang' => false,
        ),
        'TA_OXTIMESTAMP'         => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'insert time',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_D3TRANSACTIONTIME'   => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3TRANSACTIONTIME',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'transaction time',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_D3TRANSACTIONSTATUS' => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3TRANSACTIONSTATUS',
            'sType'       => 'VARCHAR(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'transaction status',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_D3ACTION'            => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3ACTION',
            'sType'       => 'VARCHAR(8)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'request or response',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'TA_OXVALUE'             => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3TRANSACTIONDATA',
            'sType'       => 'LONGTEXT',
            'blNull'      => true,
            'sDefault'    => false,
            'sComment'    => 'transaction values',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'O2D_OXID'               => array(
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'O2D_OXOBJECTID'         => array(
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'OXOBJECTID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'O2D_D3TRANSACTIONLOGID' => array(
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'D3GROUP',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'O2D_OXTYPE'             => array(
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'OXTYPE',
            'sType'       => 'VARCHAR(255)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'O2D_OXTIMESTAMP'         => array(
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'insert time',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
    );

    public $aIndizes = array(
        'PRIMARY'                => array(
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_PRIMARY,
            'aFields'    => array(
                'OXID' => 'OXID',
            ),
        ),
        /** will automaticly added by "AUTO_INCREMENT UNIQUE"
         * 'OXCOUNTER'    => array
         * (
         * 'sTableName' => 'd3log',
         * 'sType'      => d3database::INDEX_TYPE_UNIQUE,
         * 'sName'      => 'OXCOUNTER',
         * 'aFields'    => array
         * (
         * 'OXCOUNTER' => 'OXCOUNTER',
         * ),
         * ),
         **/
        'OXACTION'               => array(
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'OXACTION',
            'aFields'    => array(
                'OXACTION' => 'OXACTION',
            ),
        ),
        'OXCLASS'                => array(
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'OXCLASS',
            'aFields'    => array(
                'OXCLASS' => 'OXCLASS',
            ),
        ),
        'OXMODID'                => array(
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'OXMODID',
            'aFields'    => array(
                'OXCLASS' => 'OXMODID',
            ),
        ),
        'OXLOGTYPE'              => array(
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'OXLOGTYPE',
            'aFields'    => array(
                'OXCLASS' => 'OXLOGTYPE',
            ),
        ),
        'TA_PRIMARY'             => array(
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_PRIMARY,
            'aFields'    => array(
                'OXID' => 'OXID',
            ),
        ),
        'TA_D3LOGNR'             => array(
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_UNIQUE,
            'sName'      => 'D3LOGNR',
            'aFields'    => array(
                'D3LOGNR' => 'D3LOGNR',
            ),
        ),
        'TA_D3ACTION'            => array(
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3ACTION',
            'aFields'    => array(
                'D3ACTION' => 'D3ACTION',
            ),
        ),
        'TA_D3TRANSACTIONTIME'   => array(
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3TRANSACTIONTIME',
            'aFields'    => array(
                'D3TRANSACTIONTIME' => 'D3TRANSACTIONTIME',
            ),
        ),
        'TA_D3MODID'             => array(
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3MODID',
            'aFields'    => array(
                'D3MODID' => 'D3MODID',
            ),
        ),
        'TA_D3TRANSACTIONSTATUS' => array(
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3TRANSACTIONSTATUS',
            'aFields'    => array(
                'D3TRANSACTIONSTATUS' => 'D3TRANSACTIONSTATUS',
            ),
        ),
        'TA_D3REFERENCE' => array(
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3REFERENCE',
            'aFields'    => array(
                'D3REFERENCE' => 'D3REFERENCE',
            ),
        ),
        'TA_D3GROUP_D3LOGNR_D3ACTION' => array(
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3GROUP_D3LOGNR_D3ACTION',
            'aFields'    => array(
                'D3GROUP' => 'D3GROUP',
                'D3LOGNR' => 'D3LOGNR',
                'D3ACTION' => 'D3ACTION',
            ),
        ),
        'O2D_PRIMARY'            => array(
            'sTableName' => 'd3_d3log_oxobject2d3transactionlog',
            'sType'      => d3database::INDEX_TYPE_PRIMARY,
            'aFields'    => array(
                'OXID' => 'OXID',
            ),
        ),
        'O2D_OXTYPE'             => array(
            'sTableName' => 'd3_d3log_oxobject2d3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'aFields'    => array(
                'OXTYPE' => 'OXTYPE',
            ),
        ),
        'O2D_OXOBJECTID'             => array(
            'sTableName' => 'd3_d3log_oxobject2d3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'aFields'    => array(
                'OXOBJECTID' => 'OXOBJECTID',
            ),
        ),
        'O2D_D3GROUP'             => array(
            'sTableName' => 'd3_d3log_oxobject2d3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'aFields'    => array(
                'D3GROUP' => 'D3GROUP',
            ),
        ),
    );

    public $aRenameFields = array(
        array(
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => array('OXMODID', 'oxmodid'), // is case sensitive
            'sFieldName'     => 'D3MODID',
            'sComment'       => 'module id',
            'blMultilang'    => false,
        ),
        array(
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => array('OXPROFILEID', 'oxprofileid'),
            'sFieldName'     => 'D3PROFILEID',
            'sComment'       => 'profile id',
            'blMultilang'    => false,
        ),
        array(
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => array('OXGROUPID', 'oxgroupid'),
            'sFieldName'     => 'D3GROUP',
            'sComment'       => 'internal reference identification',
            'blMultilang'    => false,
        ),
        array(
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => array('OXREFERENCE', 'oxreference'),
            'sFieldName'     => 'D3REFERENCE',
            'sComment'       => 'external transaction identifier',
            'blMultilang'    => false,
        ),
        array(
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => array('OXTRANSACTIONTIME', 'oxtransactiontime'),
            'sFieldName'     => 'D3TRANSACTIONTIME',
            'sComment'       => 'transaction time',
            'blMultilang'    => false,
        ),
        array(
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => array('OXLOGTYPE', 'oxlogtype'),
            'sFieldName'     => 'D3TRANSACTIONSTATUS',
            'sComment'       => 'transaction status',
            'blMultilang'    => false,
        ),
        array(
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => array('OXACTION', 'oxaction'),
            'sFieldName'     => 'D3ACTION',
            'sComment'       => 'request or response ',
            'blMultilang'    => false,
        ),
        array(
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => array('OXVALUE', 'oxvalue'),
            'sFieldName'     => 'D3TRANSACTIONDATA',
            'sComment'       => 'transaction values',
            'blMultilang'    => false,
        ),
    );

    public $aDeleteFields = array(
        'OXPAYMENTID' => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXPAYMENTID',
            'blMultilang' => false,
        ),
        'OXUSERID'    => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXUSERID',
            'blMultilang' => false,
        ),
        'OXORDERID'   => array(
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXORDERID',
            'blMultilang' => false,
        ),
    );

    public $aDeleteIndexes = array(
        'OXLOGNR'           => array(
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXLOGNR',
            'blMultilang' => false,
        ),
        'OXACTION'          => array(
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXACTION',
            'blMultilang' => false,
        ),
        'OXTRANSACTIONTIME' => array(
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXTRANSACTIONTIME',
            'blMultilang' => false,
        ),
        'OXMODID'           => array(
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXMODID',
            'blMultilang' => false,
        ),
        'OXLOGTYPE'         => array(
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXLOGTYPE',
            'blMultilang' => false,
        ),
    );

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkLogTableExist()
    {
        return $this->_checkTableNotExist('d3log');
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws DBALException
     * @throws ConnectionException
     */
    public function updateLogTableExist()
    {
        $blRet = true;

        if ($this->checkLogTableExist()) {
            $this->setInitialExecMethod(__METHOD__);
            $blRet = $this->_addTable2('d3log', $this->aFields, $this->aIndizes, 'extended logging', 'InnoDB');
        }

        return $blRet;
    }

    /**
     * @return bool true, if table has wrong engine
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkLogTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $aData = $oDbTable->getTableData('d3log');

        if (isset($aData) && count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB') {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateLogTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $blRet = $oDbTable->changeTableEngine('d3log', 'InnoDB');
        return $blRet;
    }

    /**
     * @return bool true, if table has wrong engine
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkTALogTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $aData = $oDbTable->getTableData('d3transactionlog');

        if (isset($aData) && count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB') {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateTALogTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $blRet = $oDbTable->changeTableEngine('d3transactionlog', 'InnoDB');
        return $blRet;
    }

    /**
     * @return bool true, if table has wrong engine
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkO2DLogTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $aData = $oDbTable->getTableData('d3_d3log_oxobject2d3transactionlog');

        if (isset($aData) && count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB') {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateO2DLogTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $blRet = $oDbTable->changeTableEngine('d3_d3log_oxobject2d3transactionlog', 'InnoDB');
        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function isTALogTableNotExisting()
    {
        return $this->_checkTableNotExist('d3transactionlog');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateTALogTableExist()
    {
        $blRet = false;
        if ($this->isTALogTableNotExisting()) {
            $this->setInitialExecMethod(__METHOD__);
            $blRet = $this->_addTable2(
                'd3transactionlog',
                $this->aFields,
                $this->aIndizes,
                'transaction logging',
                'InnoDB'
            );
        }

        return $blRet;
    }

    /**
     * @return bool true, if error
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkLogFields()
    {
        $blReturn = false;

        if (false == $this->checkLogTableExist()) {
            $blReturn = $this->checkFields();
        }

        return $blReturn;
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateLogFields()
    {
        $blReturn = false;

        if (false == $this->checkLogTableExist()) {
            $blReturn = $this->fixFields();
        }

        return $blReturn;
    }

    /**
     * @return bool true, if error
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkLogIndizes()
    {
        return $this->checkIndizes();
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateLogIndizes()
    {
        return $this->fixIndizes();
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasOldIndizes()
    {
        $blReturn = false;

        if ($this->aDeleteIndexes && is_array($this->aDeleteIndexes) && false == empty($this->aIndizes)) {
            foreach ($this->aDeleteIndexes as $aIndex) {
                $iIterations = $aIndex['blMultilang'] ? $this->_getMultiLangFieldCount() : 0;

                for ($i = 0; $i <= $iIterations; $i++) {
                    $aIndex['sTableName'] = getLangTableName($aIndex['sTableName'], $i);
                    $aIndex['sName']      = $this->_addMultiLangAddOn($aIndex['sName'], $i);

                    // returns true if index not found
                    $blReturn = !$this->_checkTableIndex($aIndex);
                    if ($blReturn) {
                        return $blReturn;
                    }
                }
            }
        }

        return $blReturn;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function removeOldIndizes()
    {
        $blReturn = true;

        if ($this->aDeleteIndexes && is_array($this->aDeleteIndexes) && count($this->aDeleteIndexes)) {
            foreach ($this->aDeleteIndexes as $aIndex) {
                $iIterations = $aIndex['blMultilang'] ? $this->_getMultiLangFieldCount() : 0;

                for ($iLang = $iIterations; $iLang >= 0; $iLang--) {
                    $sCheckName   = $this->_addMultiLangAddOn($aIndex['sName'], $iLang);
                    $sMLTableName = getLangTableName($aIndex['sTableName'], $iLang);

                    if (false == $this->_checkTableIndex(
                        array(
                            'sTableName' => $sMLTableName,
                            'sName' => $sCheckName
                        )
                    )) {
                        $blReturn = $this->_dropTableIndex($sMLTableName, $sCheckName);
                    }
                }
            }
        }

        return $blReturn;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkO2DLogTableExist()
    {
        return $this->_checkTableNotExist('d3_d3log_oxobject2d3transactionlog');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateO2DLogTableExist()
    {
        $blRet = false;
        if ($this->checkO2DLogTableExist()) {
            $aRet  = $this->_addTable2(
                'd3_d3log_oxobject2d3transactionlog',
                $this->aFields,
                $this->aIndizes,
                '',
                'InnoDB'
            );
            $blRet = $aRet['blRet'];
            $this->setActionLog('SQL', $aRet['sql'], __METHOD__);
            $this->setUpdateBreak(true);
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasOldTALogTable()
    {
        $blRet = false;
        if (false == $this->isTALogTableNotExisting()) {
            if ($this->_checkTableFieldExist('d3transactionlog', 'OXLOGNR')) {
                $blRet = true;
            }

        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function deleteOldTALogTable()
    {
        $blRet = false;
        if ($this->hasOldTALogTable()) {
            $blRet = $this->_dropTable('d3transactionlog');
        }

        return $blRet;
    }
}
