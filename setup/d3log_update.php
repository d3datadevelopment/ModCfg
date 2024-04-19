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
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Core\Exception\ConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;

class d3log_update extends d3install_updatebase
{
    protected $_aUpdateMethods = [
        ['check' => 'checkLogTableExist',
              'do'    => 'updateLogTableExist'],
        ['check' => 'checkLogTableEngine',
              'do'    => 'updateLogTableEngine'],
        ['check' => 'isTALogTableNotExisting',
              'do'    => 'updateTALogTableExist'],
        ['check' => 'hasOldTALogTable',
              'do'    => 'deleteOldTALogTable'],
        ['check' => 'checkTALogTableEngine',
              'do'    => 'updateTALogTableEngine'],
        ['check' => 'checkO2DLogTableExist',
              'do'    => 'updateO2DLogTableExist'],
        ['check' => 'checkO2DLogTableEngine',
              'do'    => 'updateO2DLogTableEngine'],
        ['check' => 'checkRenameFields',
              'do'    => 'fixRenameFields'],
        ['check' => 'checkDeleteFields',
              'do'    => 'fixDeleteFields'],
        ['check' => 'checkLogFields',
              'do'    => 'updateLogFields'],
        ['check' => 'checkLogIndizes',
              'do'    => 'updateLogIndizes'],
        ['check' => 'hasOldIndizes',
              'do'    => 'removeOldIndizes',],
    ];

    protected $_oModCfg;

    protected $_sLib = 'd3log';

    protected $_sTblName = 'd3log';

    public $aFields = [
        'OXID'                   => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXSHOPID'               => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXSHOPID',
            'sType'       => 'VARCHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXSESSID'               => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXSESSID',
            'sType'       => 'VARCHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXLOGTYPE'              => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXLOGTYPE',
            'sType'       => 'VARCHAR(15)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXCOUNTER'              => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXCOUNTER',
            'sType'       => 'INT(15)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => 'AUTO_INCREMENT UNIQUE',
            'blMultilang' => false,
        ],
        'OXTIME'                 => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXTIME',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'log time',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXMODID'                => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXMODID',
            'sType'       => 'VARCHAR(100)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXPROFILEID'            => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXPROFILEID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXCLASS'                => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXCLASS',
            'sType'       => 'VARCHAR(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXFNC'                  => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXFNC',
            'sType'       => 'VARCHAR(100)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXLINE'                 => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXLINE',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXACTION'               => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXACTION',
            'sType'       => 'VARCHAR(100)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXTEXT'                 => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXTEXT',
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXTIMESTAMP'            => [
            'sTableName'  => 'd3log',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'insert time',
            'sExtra'      => 'ON UPDATE CURRENT_TIMESTAMP',
            'blMultilang' => false,
        ],
        'TA_OXID'                => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_OXSHOPID'            => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXSHOPID',
            'sType'       => 'VARCHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_OXSESSID'            => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXSESSID',
            'sType'       => 'VARCHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'session identification',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_D3MODID'             => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3MODID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module id',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_D3PROFILEID'         => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3PROFILEID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile id',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_D3GROUP'             => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3GROUP',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'internal reference identification',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_D3REFERENCE'         => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3REFERENCE',
            'sType'       => 'VARCHAR(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'external transaction identifier',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_D3LOGNR'             => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3LOGNR',
            'sType'       => 'INT(15)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'internal counter',
            'sExtra'      => 'AUTO_INCREMENT',
            'blMultilang' => false,
        ],
        'TA_OXTIMESTAMP'         => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'insert time',
            'sExtra'      => 'ON UPDATE CURRENT_TIMESTAMP',
            'blMultilang' => false,
        ],
        'TA_D3TRANSACTIONTIME'   => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3TRANSACTIONTIME',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'transaction time',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_D3TRANSACTIONSTATUS' => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3TRANSACTIONSTATUS',
            'sType'       => 'VARCHAR(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'transaction status',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_D3ACTION'            => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3ACTION',
            'sType'       => 'VARCHAR(8)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'request or response',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'TA_OXVALUE'             => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'D3TRANSACTIONDATA',
            'sType'       => 'LONGTEXT',
            'blNull'      => true,
            'sDefault'    => false,
            'sComment'    => 'transaction values',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'O2D_OXID'               => [
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'O2D_OXOBJECTID'         => [
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'OXOBJECTID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'O2D_D3TRANSACTIONLOGID' => [
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'D3GROUP',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'O2D_OXTYPE'             => [
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'OXTYPE',
            'sType'       => 'VARCHAR(255)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'O2D_OXTIMESTAMP'         => [
            'sTableName'  => 'd3_d3log_oxobject2d3transactionlog',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'insert time',
            'sExtra'      => 'ON UPDATE CURRENT_TIMESTAMP',
            'blMultilang' => false,
        ],
    ];

    public $aIndizes = [
        'PRIMARY'                => [
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_PRIMARY,
            'aFields'    => [
                'OXID' => 'OXID',
            ],
        ],
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
        'OXACTION'               => [
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'OXACTION',
            'aFields'    => [
                'OXACTION' => 'OXACTION',
            ],
        ],
        'OXCLASS'                => [
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'OXCLASS',
            'aFields'    => [
                'OXCLASS' => 'OXCLASS',
            ],
        ],
        'OXMODID'                => [
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'OXMODID',
            'aFields'    => [
                'OXCLASS' => 'OXMODID',
            ],
        ],
        'OXLOGTYPE'              => [
            'sTableName' => 'd3log',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'OXLOGTYPE',
            'aFields'    => [
                'OXCLASS' => 'OXLOGTYPE',
            ],
        ],
        'TA_PRIMARY'             => [
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_PRIMARY,
            'aFields'    => [
                'OXID' => 'OXID',
            ],
        ],
        'TA_D3LOGNR'             => [
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_UNIQUE,
            'sName'      => 'D3LOGNR',
            'aFields'    => [
                'D3LOGNR' => 'D3LOGNR',
            ],
        ],
        'TA_D3ACTION'            => [
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3ACTION',
            'aFields'    => [
                'D3ACTION' => 'D3ACTION',
            ],
        ],
        'TA_D3TRANSACTIONTIME'   => [
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3TRANSACTIONTIME',
            'aFields'    => [
                'D3TRANSACTIONTIME' => 'D3TRANSACTIONTIME',
            ],
        ],
        'TA_D3MODID'             => [
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3MODID',
            'aFields'    => [
                'D3MODID' => 'D3MODID',
            ],
        ],
        'TA_D3TRANSACTIONSTATUS' => [
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3TRANSACTIONSTATUS',
            'aFields'    => [
                'D3TRANSACTIONSTATUS' => 'D3TRANSACTIONSTATUS',
            ],
        ],
        'TA_D3REFERENCE' => [
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3REFERENCE',
            'aFields'    => [
                'D3REFERENCE' => 'D3REFERENCE',
            ],
        ],
        'TA_D3GROUP_D3LOGNR_D3ACTION' => [
            'sTableName' => 'd3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'sName'      => 'D3GROUP_D3LOGNR_D3ACTION',
            'aFields'    => [
                'D3GROUP' => 'D3GROUP',
                'D3LOGNR' => 'D3LOGNR',
                'D3ACTION' => 'D3ACTION',
            ],
        ],
        'O2D_PRIMARY'            => [
            'sTableName' => 'd3_d3log_oxobject2d3transactionlog',
            'sType'      => d3database::INDEX_TYPE_PRIMARY,
            'aFields'    => [
                'OXID' => 'OXID',
            ],
        ],
        'O2D_OXTYPE'             => [
            'sTableName' => 'd3_d3log_oxobject2d3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'aFields'    => [
                'OXTYPE' => 'OXTYPE',
            ],
        ],
        'O2D_OXOBJECTID'             => [
            'sTableName' => 'd3_d3log_oxobject2d3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'aFields'    => [
                'OXOBJECTID' => 'OXOBJECTID',
            ],
        ],
        'O2D_D3GROUP'             => [
            'sTableName' => 'd3_d3log_oxobject2d3transactionlog',
            'sType'      => d3database::INDEX_TYPE_INDEX,
            'aFields'    => [
                'D3GROUP' => 'D3GROUP',
            ],
        ],
    ];

    public $aRenameFields = [
        [
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => ['OXMODID', 'oxmodid'], // is case sensitive
            'sFieldName'     => 'D3MODID',
            'sComment'       => 'module id',
            'blMultilang'    => false,
        ],
        [
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => ['OXPROFILEID', 'oxprofileid'],
            'sFieldName'     => 'D3PROFILEID',
            'sComment'       => 'profile id',
            'blMultilang'    => false,
        ],
        [
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => ['OXGROUPID', 'oxgroupid'],
            'sFieldName'     => 'D3GROUP',
            'sComment'       => 'internal reference identification',
            'blMultilang'    => false,
        ],
        [
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => ['OXREFERENCE', 'oxreference'],
            'sFieldName'     => 'D3REFERENCE',
            'sComment'       => 'external transaction identifier',
            'blMultilang'    => false,
        ],
        [
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => ['OXTRANSACTIONTIME', 'oxtransactiontime'],
            'sFieldName'     => 'D3TRANSACTIONTIME',
            'sComment'       => 'transaction time',
            'blMultilang'    => false,
        ],
        [
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => ['OXLOGTYPE', 'oxlogtype'],
            'sFieldName'     => 'D3TRANSACTIONSTATUS',
            'sComment'       => 'transaction status',
            'blMultilang'    => false,
        ],
        [
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => ['OXACTION', 'oxaction'],
            'sFieldName'     => 'D3ACTION',
            'sComment'       => 'request or response ',
            'blMultilang'    => false,
        ],
        [
            'sTableName'     => 'd3transactionlog',
            'mOldFieldNames' => ['OXVALUE', 'oxvalue'],
            'sFieldName'     => 'D3TRANSACTIONDATA',
            'sComment'       => 'transaction values',
            'blMultilang'    => false,
        ],
    ];

    public $aDeleteFields = [
        'OXPAYMENTID' => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXPAYMENTID',
            'blMultilang' => false,
        ],
        'OXUSERID'    => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXUSERID',
            'blMultilang' => false,
        ],
        'OXORDERID'   => [
            'sTableName'  => 'd3transactionlog',
            'sFieldName'  => 'OXORDERID',
            'blMultilang' => false,
        ],
    ];

    public $aDeleteIndexes = [
        'OXLOGNR'           => [
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXLOGNR',
            'blMultilang' => false,
        ],
        'OXACTION'          => [
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXACTION',
            'blMultilang' => false,
        ],
        'OXTRANSACTIONTIME' => [
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXTRANSACTIONTIME',
            'blMultilang' => false,
        ],
        'OXMODID'           => [
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXMODID',
            'blMultilang' => false,
        ],
        'OXLOGTYPE'         => [
            'sTableName'  => 'd3transactionlog',
            'sName'       => 'OXLOGTYPE',
            'blMultilang' => false,
        ],
    ];

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

        return !(count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB');
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

        return !(count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB');
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

        return !(count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB');
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
                        [
                            'sTableName' => $sMLTableName,
                            'sName' => $sCheckName,
                        ]
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
            $blRet  = $this->_addTable2(
                'd3_d3log_oxobject2d3transactionlog',
                $this->aFields,
                $this->aIndizes,
                '',
                'InnoDB'
            );
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
