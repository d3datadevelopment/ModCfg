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

namespace D3\ModCfg\setup;

use OxidEsales\Eshop\Application\Controller\Admin\RolesBackendMain;
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\Shopcompatibility\d3ShopCompatibilityAdapterHandler;
use D3\ModCfg\Application\Model\Shopcompatibility\d3shopversionconverter;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbtable;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbrecord;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\Exception as DBALDriverException;
use Exception;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\ConnectionProviderInterface;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Setup\Bridge\ModuleActivationBridge;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Setup\Bridge\ModuleActivationBridgeInterface;
use OxidEsales\Facts\Facts;
use OxidEsales\Eshop\Core\ShopVersion;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Application\Model\Shop;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\ConnectionException;
use Doctrine\DBAL\Exception as DBALException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class d3_cfg_mod_update extends d3install_updatebase
{
    protected $_aUpdateMethods = [
        ['check' => 'isModCfgModuleInactive',
              'do'    => 'activateModCfgModule'],
        ['check' => 'checkModCfgMultiLangTable',
              'do'    => 'registerModCfgMultiLangTable'],
        ['check' => 'checkConvertModCfgToMultiLangTable',
              'do'    => 'convertModCfgToMultilangTable'],
        ['check' => 'checkModCfgTableExist',
              'do'    => 'addModCfgTable'],
        ['check' => 'checkModCfgTableEngine',
              'do'    => 'updateModCfgTableEngine'],
        ['check' => 'checkModprofileMultiLangTable',
              'do'    => 'registerModprofileMultiLangTable'],
        ['check' => 'checkOxarticlesMultiShopTable',
              'do'    => 'resetMultiShopTables'],
        ['check' => 'checkModprofileMultiShopTable',
              'do'    => 'registerModprofileMultiShopTable'],
        ['check' => 'checkConvertModprofileToMultiLangTable',
              'do'    => 'convertModprofileToMultilangTable'],
        ['check' => 'checkModProfileTableExist',
              'do'    => 'addModProfileTable'],
        ['check' => 'checkModProfileTableEngine',
              'do'    => 'updateModProfileTableEngine'],
        ['check' => 'checkModCfgVariantMultiLangTable',
              'do'    => 'registerModCfgVariantMultiLangTable'],
        ['check' => 'checkConvertModCfgVariantToMultiLangTable',
              'do'    => 'convertModCfgVariantToMultilangTable'],
        ['check' => 'checkModCfgVariantTableExist',
              'do'    => 'addModCfgVariantTable'],
        ['check' => 'checkModCfgVariantTableEngine',
              'do'    => 'updateModCfgVariantTableEngine'],
        ['check' => 'checkCacheTableExist',
              'do'    => 'addCacheTable'],
        ['check' => 'checkModCfgFields',
              'do'    => 'fixFields'],
        ['check' => 'checkIndizes',
              'do'    => 'fixIndizes'],
        ['check' => 'hasNoModCfgItem',
              'do'    => 'updateModCfgItem'],
        ['check' => 'hasModProfileExclInclItems',
              'do'    => 'updateModProfileExclInclItems'],
        ['check' => 'hasOldModuleFiles',
              'do'    => 'deleteOldModuleFiles'],
        ['check' => 'hasDuplicateBlockItem',
              'do'    => 'deleteDuplicateBlockItems'],
        ['check' => 'hasNonNamespacedRolesBemainExtension',
              'do'    => 'removeNonNamespacedRolesBemainExtension'],
        ['check' => 'hasModcfgMultilangSetting',
              'do'    => 'addModcfgMultilangSetting'],
        ['check' => 'checkModCfgSameRevision',
              'do'    => 'updateModCfgSameRevision'],
    ];

    public $sModKey = 'd3modcfg_lib';
    public $sModName = 'Modul-Connector';
    public $sModVersion = '7.1.0.0';
    public $sBaseConf =
        'yb0v2==ZExxanpJS0JNUzBrUlJ4UWZBeG0zL0RKYTlaTHIrVGFOTm1ZaUllenUzK2ZheXFpNFBudm5WL
1J0bGd2amYrYm9YSXVSeFAxeVpRaitkc1VwTHlweVJFSE1naHBrRUp5Zmd2OG9IWDIxS2I0Z2JNTkNTN
XduS0toRmdEd2FsWTRTUzB2MXJXWm5pcFdDT2kzNUw2cm14QXo4S0lzWnJ0S1VhY1QxRXBldVdleXpuK
21OTlAwdStkRVJmVGdMditpbWVZKzU2NldGcVhiM2ozZkhzdGNTVldXaGJCS0xnK3IzOGpVdFpzUkYxM
nFSRjR2R0dqTlFBKzd4TkllOGpSbE9QSC9qdkladzFVdnJJQXdoYnV6WVFKcFdpcHA2OXk0K0N6eDVZb
U5LRmRmeStIUFFqQ1pNOC9tbjZRUURISko=';
    public $sRequirements = '';
    public $sBaseValue = '';

    protected $_oModCfg;
    protected $_sLib = 'd3_cfg_mod';
    protected $_sTblName = 'd3_cfg_mod';

    // will set via specialized methods, change table name there
    public $aMultiLangTables = ['d3modprofile', 'd3_cfg_mod'];

    // will set via specialized methods, change table name there
    public $aMultiShopTables = ['d3modprofile'];

    public $aFields = [
        'OXID'           => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXSHOPID'       => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXSHOPID',
            'sType'       => 'varchar(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module shopassignment',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXMODID'        => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXMODID',
            'sType'       => 'varchar(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module ident',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXNAME'         => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXNAME',
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module longname',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXACTIVE'       => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXACTIVE',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'active status',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXBASECONFIG'   => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXBASECONFIG',
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'module base configuration settings',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXACTIDENT'       => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXACTIDENT',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module activation ident',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXSERIAL'       => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXSERIAL',
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'module serial',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXINSTALLDATE'  => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXINSTALLDATE',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'install date',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXVERSION'      => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXVERSION',
            'sType'       => 'VARCHAR(10)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module version number',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXVERSIONNUM'      => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXVERSIONNUM',
            'sType'       => 'INT(10) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => 0,
            'sComment'    => 'numeric module version number',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXSHOPVERSION'  => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXSHOPVERSION',
            'sType'       => 'VARCHAR(10)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'shop edition and major version',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXISMODULELOG'  => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXISMODULELOG',
            'sType'       => 'BIGINT(20)',
            'blNull'      => false,
            'sDefault'    => '15',
            'sComment'    => 'module log setting',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXREQUIREMENTS' => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXREQUIREMENTS',
            'sType'       => 'LONGTEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'module requirements',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXVALUE'        => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXVALUE',
            'sType'       => 'LONGTEXT',
            'blNull'      => true,
            'sDefault'    => false,
            'sComment'    => 'module settings',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'OXREVISION'     => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXREVISION',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'installed revision',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXNEWREVISION'  => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXNEWREVISION',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'revision after successful update',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'USEMULTILANG'  => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'USEMULTILANG',
            'sType'       => 'TINYINT(1)',
            'blNull'      => true,
            'sDefault'    => 'NULL',
            'sComment'    => 'takes data from fields in other languages, if set',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXTIMESTAMP'  => [
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'last change',
            'sExtra'      => 'ON UPDATE CURRENT_TIMESTAMP',
            'blMultilang' => false,
        ],

        'PROF_OXID'           => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXSHOPID'       => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSHOPID',
            'sType'       => 'varchar(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile shop assignment',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXSHOPINCL'       => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSHOPINCL',
            'sType'       => 'BIGINT(32) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'profile shop inclusion',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXSHOPEXCL'       => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSHOPEXCL',
            'sType'       => 'BIGINT(32) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'profile shop exclusion',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXACTIVE'       => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXACTIVE',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'active status',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'PROF_OXACTIVEFROM'       => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXACTIVEFROM',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'active from date',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'PROF_OXACTIVETO'       => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXACTIVETO',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'active to date',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'PROF_OXMODID'        => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXMODID',
            'sType'       => 'varchar(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile module assignment',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXTITLE'         => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXTITLE',
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile name',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'PROF_OXSHORTDESC'     => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSHORTDESC',
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile short description',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'PROF_OXCREATE'  => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXCREATE',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'create date',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXUPDATE'  => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXUPDATE',
            'sType'       => 'DATETIME',
            'blNull'      => true,
            'sDefault'    => 'NULL',
            'sComment'    => 'update date',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'PROF_OXMODVERSION'      => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXMODVERSION',
            'sType'       => 'VARCHAR(10)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module version number',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXLOG'  => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXLOG',
            'sType'       => 'BIGINT(20)',
            'blNull'      => true,
            'sDefault'    => 'NULL',
            'sComment'    => 'profile log setting',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'PROF_OXVALUE'        => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXVALUE',
            'sType'       => 'LONGTEXT',
            'blNull'      => true,
            'sDefault'    => false,
            'sComment'    => 'profile settings',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'PROF_OXFOLDER'      => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXFOLDER',
            'sType'       => 'VARCHAR(70)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'folder name',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXSORT'      => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSORT',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'sort ident',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXWRITEPROTECTION'      => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXWRITEPROTECTION',
            'sType'       => 'INT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'write protection',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXDATATYPE'      => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXDATATYPE',
            'sType'       => 'CHAR(10)',
            'blNull'      => false,
            'sDefault'    => 'default',
            'sComment'    => 'data type',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_MULTILANG'  => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'USEMULTILANG',
            'sType'       => 'TINYINT(1)',
            'blNull'      => true,
            'sDefault'    => 'NULL',
            'sComment'    => 'takes data from fields in other languages, if set',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'PROF_OXTIMESTAMP'  => [
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'last change',
            'sExtra'      => 'ON UPDATE CURRENT_TIMESTAMP',
            'blMultilang' => false,
        ],
        'VARI_OXID'  => [
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'VARI_OXPARENTID'  => [
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXPARENTID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'VARI_OXNAME'  => [
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXNAME',
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'VARI_OXVALUE'  => [
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXVALUE',
            'sType'       => 'longtext',
            'blNull'      => true,
            'sDefault'    => false,
            'sComment'    => 'module settings',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'VARI_OXTIMESTAMP'  => [
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'last change',
            'sExtra'      => 'ON UPDATE CURRENT_TIMESTAMP',
            'blMultilang' => false,
        ],
        'CACHE_OXID'  => [
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'CACHE_OXVALUE'  => [
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXVALUE',
            'sType'       => 'blob',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'CACHE_OXTYPE'  => [
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXTYPE',
            'sType'       => 'varchar(20)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'CACHE_OXLASTCHANGE'  => [
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXLASTCHANGE',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'CACHE_TIMESTAMP'  => [
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'last change',
            'sExtra'      => 'ON UPDATE CURRENT_TIMESTAMP',
            'blMultilang' => false,
        ],
    ];

    public $aIndizes = [
        'PRIMARY'  => [
            'sTableName'  => 'd3_cfg_mod',
            'sType'   => d3database::INDEX_TYPE_PRIMARY,
            'aFields' => [
                'OXID' => 'OXID',
            ],
            'blMultilang' => false,
        ],
        'OXSHOPID' => [
            'sTableName'  => 'd3_cfg_mod',
            'sType'   => d3database::INDEX_TYPE_UNIQUE,
            'sName'   => 'OXSHOPID',
            'aFields' => [
                'OXSHOPID' => 'OXSHOPID',
                'OXMODID'  => 'OXMODID',
            ],
            'blMultilang' => false,
        ],

        'PROF_PRIMARY'  => [
            'sTableName'  => 'd3modprofile',
            'sType'   => d3database::INDEX_TYPE_PRIMARY,
            'aFields' => [
                'OXID' => 'OXID',
            ],
            'blMultilang' => false,
        ],
        'PROF_OXSHOPID' => [
            'sTableName'  => 'd3modprofile',
            'sType'   => d3database::INDEX_TYPE_INDEX,
            'sName'   => 'OXMODSHOPID',
            'aFields' => [
                'OXSHOPID' => 'OXSHOPID',
                'OXMODID'  => 'OXMODID',
            ],
            'blMultilang' => false,
        ],

        'VARI_PRIMARY'  => [
            'sTableName'  => 'd3_cfg_mod_variant',
            'sType'   => d3database::INDEX_TYPE_PRIMARY,
            'aFields' => [
                'OXID' => 'OXID',
            ],
            'blMultilang' => false,
        ],
        'VARI_OXPARENTID' => [
            'sTableName'  => 'd3_cfg_mod_variant',
            'sType'   => d3database::INDEX_TYPE_INDEX,
            'sName'   => 'OXPARENTID',
            'aFields' => [
                'OXPARENTID' => 'OXPARENTID',
            ],
            'blMultilang' => false,
        ],

        'CACHE_PRIMARY'  => [
            'sTableName'  => 'd3cache',
            'sType'   => d3database::INDEX_TYPE_PRIMARY,
            'aFields' => [
                'OXID' => 'OXID',
            ],
            'blMultilang' => false,
        ],
    ];

    public $aOldModuleFiles = [
        'd3_modcfg_stub.php',
        'models/d3modcfg_cleanup.php',
        'models/d3_cfg_mod_update.php',
        'views/admin/tpl/d3_cfg_mod_bottom.tpl',
        'views/admin/tpl/d3_cfg_mod_inc.tpl',
    ];

    protected $_aRefreshMetaModuleIds = [Constants::OXID_MODULE_ID];

    /**
     * @return bool
     * @throws ConnectionException
     */
    public function checkModCfgMultiLangTable()
    {
        return $this->checkMultiLangTables('d3_cfg_mod');
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkConvertModCfgToMultiLangTable()
    {
        return $this->checkConvertToMultiLangTable('d3_cfg_mod');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function registerModCfgMultiLangTable()
    {
        return $this->fixRegisterMultiLangTables('d3_cfg_mod');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function convertModCfgToMultilangTable()
    {
        return $this->convertToMultilangTable('d3_cfg_mod');
    }

    /**
     * @return bool
     * @throws ConnectionException
     */
    public function checkModprofileMultiLangTable()
    {
        return $this->checkMultiLangTables('d3modprofile');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function registerModprofileMultiLangTable()
    {
        return $this->fixRegisterMultiLangTables('d3modprofile');
    }

    /**
     * @return bool
     * @throws ConnectionException
     */
    public function checkModCfgVariantMultiLangTable()
    {
        return $this->checkMultiLangTables('d3_cfg_mod_variant');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function registerModCfgVariantMultiLangTable()
    {
        return $this->fixRegisterMultiLangTables('d3_cfg_mod_variant');
    }

    /**
     * Bugfix for empty multishoptables from rev. 1244 in 4.3.4.0
     * @return bool
     * @throws ConnectionException
     * @throws Exception
     */
    public function checkOxarticlesMultiShopTable()
    {
        $blRet = false;

        if (in_array(oxNew(Facts::class)->getEdition(), ['B2B', 'EE'])) {
            $sCurrentShopId = Registry::getConfig()->getShopId();
            /** @var Shop $oShop */
            foreach ($this->getShopList() as $oShop) {
                $this->_changeToShop($oShop->getId());
                if (false == in_array('oxarticles', Registry::getConfig()->getConfigParam('aMultiShopTables'))) {
                    $blRet = true;
                    break;
                }
            }
            $this->_changeToShop($sCurrentShopId);
        }

        return $blRet;
    }

    /**
     * Bugfix for empty multishoptables from rev. 1244 in 4.3.4.0
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws Exception
     */
    public function resetMultiShopTables()
    {
        $sCurrentShopId = Registry::getConfig()->getShopId();

        if (in_array(oxNew(Facts::class)->getEdition(), ['B2B', 'EE'])) {
            /** @var Shop $oShop */
            foreach ($this->getShopList() as $oShop) {
                $this->_changeToShop($oShop->getId());
                if (false == in_array('oxarticles', Registry::getConfig()->getConfigParam('aMultiShopTables'))) {
                    $this->deleteMultiShopTables($oShop->getId());
                }
            }
        }

        $this->_changeToShop($sCurrentShopId);

        return true;
    }

    /**
     * @return bool
     */
    public function checkModprofileMultiShopTable()
    {
        return $this->checkMultiShopTables('d3modprofile');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function registerModProfileMultiShopTable()
    {
        return $this->fixRegisterMultiShopTables('d3modprofile');
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkConvertModprofileToMultiLangTable()
    {
        return $this->checkConvertToMultiLangTable('d3modprofile');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function convertModprofileToMultilangTable()
    {
        return $this->convertToMultilangTable('d3modprofile');
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkConvertModCfgVariantToMultiLangTable()
    {
        return $this->checkConvertToMultiLangTable('d3_cfg_mod_variant');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function convertModCfgVariantToMultilangTable()
    {
        return $this->convertToMultilangTable('d3_cfg_mod_variant');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws Exception
     */
    public function checkModCfgFields()
    {
        $this->fixFieldsToDefaultEdition();
        return $this->checkFields();
    }

    /**
     * @return bool
     */
    public function isModCfgModuleInactive()
    {
        /** @var Module $oModule */
        $oModule = oxNew(Module::class);
        $oModule->load($this->sModKey);
        if (false == $oModule->isActive()) {
            return true;
        }

        return false;
    }

    /**
     * @return bool|mixed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function activateModCfgModule()
    {
        $blRet = true;

        if ($this->isModCfgModuleInactive()) {
            if ($this->hasExecute()) {
                $container = ContainerFactory::getInstance()->getContainer();
                /** @var ModuleActivationBridge $moduleActivationBridge */
                $moduleActivationBridge = $container->get(ModuleActivationBridgeInterface::class);
                $moduleActivationBridge->activate(
                    $this->sModKey,
                    Registry::getConfig()->getShopId()
                );
            }

            $this->setActionLog(
                'MSG',
                Registry::getLang()->translateString('D3_UPDATE_MSG_DISABLED_MODCFGMODULE'),
                $this->getInitialExecMethod(__METHOD__)
            );

            $this->setUpdateBreak(true);
        }

        return $blRet;
    }

    /**
     * @return bool true, if table is missing
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkModCfgTableExist()
    {
        return $this->_checkTableNotExist('d3_cfg_mod');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function addModCfgTable()
    {
        $this->setInitialExecMethod(__METHOD__);
        return $this->_addTable2(
            'd3_cfg_mod',
            $this->aFields,
            $this->aIndizes,
            'module configuration',
            'InnoDB'
        );
    }

    /**
     * @return bool true, if table has wrong engine
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkModCfgTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $aData = $oDbTable->getTableData('d3_cfg_mod');

        return !(count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB');
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateModCfgTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        return $oDbTable->changeTableEngine('d3_cfg_mod', 'InnoDB');
    }

    /**
     * @return bool true, if table has wrong engine
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkModProfileTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $aData = $oDbTable->getTableData('d3modprofile');

        return !(count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB');
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateModProfileTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        return $oDbTable->changeTableEngine('d3modprofile', 'InnoDB');
    }

    /**
     * @return bool true, if table has wrong engine
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkModCfgVariantTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $aData = $oDbTable->getTableData('d3_cfg_mod_variant');

        return !(count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB');
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateModCfgVariantTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        return $oDbTable->changeTableEngine('d3_cfg_mod_variant', 'InnoDB');
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasModProfileExclInclItems()
    {
        return $this->_hasMoveExclInclItemsTo2Shop('d3modprofile');
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateModProfileExclInclItems()
    {
        $blRet = true;

        if ($this->hasModProfileExclInclItems()) {
            $blRet = $this->_moveExclInclItemsTo2ShopRelation('d3modprofile');
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function hasNoModCfgItem()
    {
        /** @var d3installdbrecord $oDbRecord */
        $oDbRecord = oxNew(d3installdbrecord::class, $this);

        /** @var Shop $oShop */
        foreach ($this->getShopList() as $oShop) {
            $aWhere = [
                'oxmodid'       => $this->sModKey,
                'oxversion'     => $this->sModVersion,
                'oxshopid'      => $oShop->getId(),
            ];

            if ($oDbRecord->checkTableRecordNotExist('d3_cfg_mod', $aWhere)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws ContainerExceptionInterface
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws NotFoundExceptionInterface
     * @throws DBALException
     */
    public function updateModCfgItem()
    {
        $blRet = false;

        if ($this->hasNoModCfgItem()) {
            /** @var d3installdbrecord $oDbRecord */
            $oDbRecord = oxNew(d3installdbrecord::class, $this);
            $this->setInitialExecMethod(__METHOD__);

            /** @var Shop $oShop */
            foreach ($this->getShopList() as $oShop) {
                $aWhere = [
                    'oxmodid'       => $this->sModKey,
                    'oxshopid'      => $oShop->getId(),
                    'oxversion'     => $this->sModVersion,
                ];

                if ($oDbRecord->checkTableRecordNotExist('d3_cfg_mod', $aWhere)) {
                    // update don't use this property
                    unset($aWhere['oxversion']);
                    /** @var d3shopversionconverter $oShopVersionConverter */
                    $oShopVersionConverter = oxNew(d3shopversionconverter::class);

                    $aInsertFields = [
                        'OXID'           => [
                            'content'       => "md5('" . $this->sModKey . " " . $oShop->getId() . " de')",
                            'force_update'  => true,
                            'use_quote'     => false,
                        ],
                        'OXSHOPID'       => [
                            'content'       => $oShop->getId(),
                            'force_update'  => true,
                            'use_quote'     => true,
                        ],
                        'OXMODID'        => [
                            'content'       => $this->sModKey,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ],
                        'OXNAME'         => [
                            'content'       => $this->sModName,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ],
                        'OXACTIVE'       => [
                            'content'       => "1",
                            'force_update'  => true,
                            'use_quote'     => false,
                        ],
                        'OXBASECONFIG'   => [
                            'content'       => $this->sBaseConf,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ],
                        'OXSERIAL'   => [
                            'content'       => "",
                            'force_update'  => false,
                            'use_quote'     => true,
                        ],
                        'OXINSTALLDATE'  => [
                            'content'       => "NOW()",
                            'force_update'  => true,
                            'use_quote'     => false,
                        ],
                        'OXVERSION'         => [
                            'content'       => $this->sModVersion,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ],
                        'OXSHOPVERSION'  => [
                            'content'       => $oShopVersionConverter->fixEditionToDefaultEdition(oxNew(Facts::class)->getEdition()),
                            'force_update'  => true,
                            'use_quote'     => true,
                        ],
                        'OXREQUIREMENTS' => [
                            'content'       => $this->sRequirements,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ],
                        'OXVALUE'        => [
                            'content'       => $this->sBaseValue,
                            'force_update'  => false,
                            'use_quote'     => true,
                        ],
                    ];

                    $this->setInitialExecMethod(__METHOD__);
                    $blRet  = $this->_updateTableItem2('d3_cfg_mod', $aInsertFields, $aWhere);
                }
            }
        }
        return $blRet;
    }

    /**
     * @return bool true, if table is missing
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkModProfileTableExist()
    {
        return $this->_checkTableNotExist('d3modprofile');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws Exception
     */
    public function addModProfileTable()
    {
        $blRet = true;

        if ($this->checkModProfileTableExist()) {
            $this->setInitialExecMethod(__METHOD__);

            $this->fixFieldsToDefaultEdition();
            $blRet  = $this->_addTable2(
                'd3modprofile',
                $this->aFields,
                $this->aIndizes,
                'module profiles',
                'InnoDB'
            );
        }

        return $blRet;
    }

    /**
     * @return bool true, if table is missing
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkModCfgVariantTableExist()
    {
        return $this->_checkTableNotExist('d3_cfg_mod_variant');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function addModCfgVariantTable()
    {
        $blRet = true;

        if ($this->checkModCfgVariantTableExist()) {
            $this->setInitialExecMethod(__METHOD__);

            $blRet  = $this->_addTable2(
                'd3_cfg_mod_variant',
                $this->aFields,
                $this->aIndizes,
                'alternative module profile settings',
                'InnoDB'
            );
        }

        return $blRet;
    }

    /**
     * @return bool true, if table is missing
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkCacheTableExist()
    {
        return $this->_checkTableNotExist('d3cache');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function addCacheTable()
    {
        $blRet = true;

        if ($this->checkCacheTableExist()) {
            $this->setInitialExecMethod(__METHOD__);

            $blRet  = $this->_addTable2(
                'd3cache',
                $this->aFields,
                $this->aIndizes,
                '',
                'InnoDB'
            );
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function hasDuplicateBlockItem()
    {
        $oQB = ContainerFactory::getInstance()->getContainer()->get(QueryBuilderFactoryInterface::class)->create();
        $oQB->select(1)
            ->from('oxtplblocks', 'tbl1')
            ->innerJoin('tbl1', 'oxtplblocks', 'tbl2', 'tbl2.oxshopid = tbl1.oxshopid AND 
                tbl2.oxtemplate = tbl1.oxtemplate AND
                tbl2.oxblockname = tbl1.oxblockname AND
                tbl2.oxtheme = tbl1.oxtheme AND
                tbl2.oxfile = tbl1.oxfile AND
                tbl2.oxmodule = tbl1.oxmodule AND
                tbl2.oxid != tbl1.oxid')
            ->groupBy(1)
            ->setMaxResults(1);

        return (bool) $oQB->execute()->fetchOne();
    }

    /**
     * @return bool
     * @throws ContainerExceptionInterface
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws NotFoundExceptionInterface
     * @throws DBALDriverException
     * @throws DBALException
     */
    public function deleteDuplicateBlockItems()
    {
        $blRet = true;

        if (!$this->hasDuplicateBlockItem()) {
            return $blRet;
        }

        $sMessage = '# '.Registry::getLang()->translateString('D3_CFG_MOD_UPDATE_JOB_SQL').PHP_EOL;

        /** @var Connection $db */
        $db = ContainerFactory::getInstance()->getContainer()->get(ConnectionProviderInterface::class)->get();

        if (!count($db->prepare("SHOW INDEX FROM oxtplblocks WHERE Column_name = 'D3DELETEID'")->executeQuery()->fetchAllAssociative())) {
            $sMessage .= "
            ALTER TABLE oxtplblocks 
                ADD `D3DELETEID` INT NOT NULL AUTO_INCREMENT ,
                DROP PRIMARY KEY,
                ADD PRIMARY KEY (`D3DELETEID`);
            ";
        }

        $sMessage .= "
            DELETE tbl1
            FROM `oxtplblocks` tbl1
            INNER JOIN `oxtplblocks` tbl2 ON
                tbl2.oxshopid = tbl1.oxshopid AND
                tbl2.oxtheme = tbl1.oxtheme AND
                tbl2.oxtemplate = tbl1.oxtemplate AND
                tbl2.oxblockname = tbl1.oxblockname AND
                tbl2.oxfile = tbl1.oxfile AND
                tbl2.oxmodule = tbl1.oxmodule AND
                tbl2.oxid != tbl1.oxid
            WHERE
                tbl1.D3DELETEID > tbl2.D3DELETEID;

            ALTER TABLE `oxtplblocks`
                DROP COLUMN `D3DELETEID`,
                DROP PRIMARY KEY,
                ADD PRIMARY KEY (`OXID`);
        ";

        $blRet                  = $this->sqlExecute($sMessage);
        $this->setActionLog('SQL', $sMessage, __METHOD__);

        return $blRet;
    }

    /**
     * @return bool
     */
    public function hasNonNamespacedRolesBemainExtension()
    {
        $aModules = Registry::getConfig()->getConfigParam('aModules');
        if (is_array($aModules)
            && isset($aModules[RolesBackendMain::class])
            && stristr($aModules[RolesBackendMain::class], 'd3/modcfg/Modules/Application/Controller/Admin/d3_roles_bemain_rolesrights')
        ) {
            return true;
        }

        return false;
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function removeNonNamespacedRolesBemainExtension()
    {
        $oConfig = Registry::getConfig();
        /** @var Shop $activeShop */
        $activeShop = $oConfig->getActiveShop();
        $sCurrentShopId = $activeShop->getId();

        if ($this->hasNonNamespacedRolesBemainExtension()) {
            /** @var Shop $oShop */
            foreach ($this->getShopList() as $oShop) {
                $this->_changeToShop($oShop->getId());

                $aModules = $oConfig->getConfigParam('aModules');
                $aExtensions = array_flip(explode('&', $aModules[RolesBackendMain::class]));
                unset($aExtensions['d3/modcfg/Modules/Application/Controller/Admin/d3_roles_bemain_rolesrights']);
                $aModules[RolesBackendMain::class] = implode('&', array_flip($aExtensions));

                $this->fixOxconfigVariable(
                    'aModules',
                    $oShop->getId(),
                    '',
                    $aModules,
                    'aarr'
                );

                if ($this->hasExecute()) {
                    $oConfig->setConfigParam('aModules', $aModules);
                }
            }

            $this->_changeToShop($sCurrentShopId);
        }
    }

    /**
     * @throws Exception
     */
    public function fixFieldsToDefaultEdition()
    {
        /** @var d3ShopCompatibilityAdapterHandler $oCompatibilityAdapter */
        $oCompatibilityAdapter = oxNew(d3ShopCompatibilityAdapterHandler::class);
        /** @var d3shopversionconverter $oShopVersionConverter */
        $oShopVersionConverter = oxNew(d3shopversionconverter::class);
        $sVersion = $oCompatibilityAdapter->getWOBetaShopVersion(
            $oShopVersionConverter->fixVersionToDefaultEdition(ShopVersion::getVersion())
        );

        if (strtoupper($oShopVersionConverter->fixEditionToDefaultEdition(oxNew(Facts::class)->getEdition())) == 'EE'
            && version_compare($sVersion, '5.2.0', '>=')
        ) {
            unset($this->aFields['PROF_OXSHOPINCL']);
            unset($this->aFields['PROF_OXSHOPEXCL']);
        }
    }
}
