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

namespace D3\ModCfg\setup;

use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\Shopcompatibility\d3ShopCompatibilityAdapterHandler;
use D3\ModCfg\Application\Model\Shopcompatibility\d3shopversionconverter;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbtable;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbrecord;
use OxidEsales\Facts\Facts;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\ShopVersion;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Application\Model\Shop;

class d3_cfg_mod_update extends d3install_updatebase
{
    protected $_aUpdateMethods = array(
        array('check' => 'isModCfgModuleInactive',
              'do'    => 'activateModCfgModule'),
        array('check' => 'hasToCleanOldLibs',
              'do'    => 'cleanOldLibs'),
        array('check' => 'checkModCfgMultiLangTable',
              'do'    => 'registerModCfgMultiLangTable'),
        array('check' => 'checkConvertModCfgToMultiLangTable',
              'do'    => 'convertModCfgToMultilangTable'),
        array('check' => 'checkModCfgTableExist',
              'do'    => 'addModCfgTable'),
        array('check' => 'checkModCfgTableEngine',
            'do'    => 'updateModCfgTableEngine'),
        array('check' => 'checkModprofileMultiLangTable',
              'do'    => 'registerModprofileMultiLangTable'),
        array('check' => 'checkOxarticlesMultiShopTable',
              'do'    => 'resetMultiShopTables'),
        array('check' => 'checkModprofileMultiShopTable',
              'do'    => 'registerModprofileMultiShopTable'),
        array('check' => 'checkConvertModprofileToMultiLangTable',
              'do'    => 'convertModprofileToMultilangTable'),
        array('check' => 'checkModProfileTableExist',
              'do'    => 'addModProfileTable'),
        array('check' => 'checkModProfileTableEngine',
              'do'    => 'updateModProfileTableEngine'),
        array('check' => 'checkModCfgVariantMultiLangTable',
              'do'    => 'registerModCfgVariantMultiLangTable'),
        array('check' => 'checkConvertModCfgVariantToMultiLangTable',
              'do'    => 'convertModCfgVariantToMultilangTable'),
        array('check' => 'checkModCfgVariantTableExist',
              'do'    => 'addModCfgVariantTable'),
        array('check' => 'checkModCfgVariantTableEngine',
              'do'    => 'updateModCfgVariantTableEngine'),
        array('check' => 'checkCacheTableExist',
              'do'    => 'addCacheTable'),
        array('check' => 'checkModCfgFields',
              'do'    => 'fixFields'),
        array('check' => 'checkIndizes',
              'do'    => 'fixIndizes'),
        array('check' => 'hasNoModCfgItem',
              'do'    => 'updateModCfgItem'),
        array('check' => 'hasModProfileExclInclItems',
              'do'    => 'updateModProfileExclInclItems'),
        array('check' => 'hasOldModuleFiles',
              'do'    => 'deleteOldModuleFiles'),
        array('check' => 'hasUnregisteredFiles',
              'do'    => 'showUnregisteredFiles'),
        array('check' => 'hasDuplicateBlockItem',
              'do'    => 'deleteDuplicateBlockItems'),
        array('check' => 'checkModCfgSameRevision',
              'do'    => 'updateModCfgSameRevision'),
        array('check' => 'hasDisabledD3VendorItem',
              'do'    => 'cleanD3VendorItem'),
    );

    public $sModKey = 'd3modcfg_lib';
    public $sModName = 'Modul-Connector';
    public $sModVersion = '5.1.0.0';
    public $sModRevision = '5100';
    public $sBaseConf =
        '771v2==TEltY0ZwTlkxeVYyekRLYU1YdjNWWlFEUmR3b1A4SWVjdFI2QmY1ZzcwQXdVN1RYUDI0ME9ld
FpaWjVQMEsrSzUyVFlneUxpcnZpZm1QcUtWVENnMW5XWFVzT1VhZnp1cWpFUnpWQ0hEWGRRRzg3VU96a
Fd1YytBNlpOQ1Jqak1VcTJQdGVhdHZMTGhDMERDZncxZmZTaHloQnlCNXFabi9VRDEreDE2Nzk3aU1Ec
1ZtdkVHYnU3ck5UVGI5UmZIdndlMTlvaE9kSExnZEhBMTdoQno2NVZPZG9qc2kwQUYyODlQeHFyRWpie
E80ZkUvVFIxa2NXWEtObDlGVzRJUzM5NFBtOXg4Sy9nVHMyNlZ1dVVXc0tsdUxkSDhUSm5JRnZKd2NvR
HpOcFVTMkd0bXRXR1JJNDMvNkVRcjVMV2k=';
    public $sRequirements = '';
    public $sBaseValue = '';

    protected $_oModCfg;
    protected $_sLib = 'd3_cfg_mod';
    protected $_sTblName = 'd3_cfg_mod';

    // will set via specialized methods, change table name there
    public $aMultiLangTables = array('d3modprofile', 'd3_cfg_mod');

    // will set via specialized methods, change table name there
    public $aMultiShopTables = array('d3modprofile');

    public $aFields = array(
        'OXID'           => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXSHOPID'       => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXSHOPID',
            'sType'       => 'varchar(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module shopassignment',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXMODID'        => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXMODID',
            'sType'       => 'varchar(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module ident',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXNAME'         => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXNAME',
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module longname',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXACTIVE'       => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXACTIVE',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'active status',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXBASECONFIG'   => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXBASECONFIG',
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'module base configuration settings',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXSERIAL'       => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXSERIAL',
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'module serial',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXINSTALLDATE'  => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXINSTALLDATE',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'install date',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXVERSION'      => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXVERSION',
            'sType'       => 'VARCHAR(10)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module version number',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXVERSIONNUM'      => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXVERSIONNUM',
            'sType'       => 'INT(10) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => 0,
            'sComment'    => 'numeric module version number',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXSHOPVERSION'  => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXSHOPVERSION',
            'sType'       => 'VARCHAR(10)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'shop edition and major version',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXISMODULELOG'  => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXISMODULELOG',
            'sType'       => 'BIGINT(20)',
            'blNull'      => false,
            'sDefault'    => '15',
            'sComment'    => 'module log setting',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXREQUIREMENTS' => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXREQUIREMENTS',
            'sType'       => 'LONGTEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'module requirements',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXVALUE'        => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXVALUE',
            'sType'       => 'LONGTEXT',
            'blNull'      => true,
            'sDefault'    => false,
            'sComment'    => 'module settings',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'OXREVISION'     => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXREVISION',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'installed revision',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXNEWREVISION'  => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXNEWREVISION',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'revision after successful update',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXTIMESTAMP'  => array(
            'sTableName'  => 'd3_cfg_mod',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'last change',
            'sExtra'      => '',
            'blMultilang' => false,
        ),

        'PROF_OXID'           => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXSHOPID'       => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSHOPID',
            'sType'       => 'varchar(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile shop assignment',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXSHOPINCL'       => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSHOPINCL',
            'sType'       => 'BIGINT(32) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'profile shop inclusion',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXSHOPEXCL'       => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSHOPEXCL',
            'sType'       => 'BIGINT(32) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'profile shop exclusion',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXACTIVE'       => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXACTIVE',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'active status',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'PROF_OXACTIVEFROM'       => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXACTIVEFROM',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'active from date',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'PROF_OXACTIVETO'       => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXACTIVETO',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'active to date',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'PROF_OXMODID'        => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXMODID',
            'sType'       => 'varchar(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile module assignment',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXTITLE'         => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXTITLE',
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile name',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'PROF_OXSHORTDESC'     => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSHORTDESC',
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'profile short description',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'PROF_OXCREATE'  => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXCREATE',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => 'create date',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXUPDATE'  => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXUPDATE',
            'sType'       => 'DATETIME',
            'blNull'      => true,
            'sDefault'    => 'NULL',
            'sComment'    => 'update date',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'PROF_OXMODVERSION'      => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXMODVERSION',
            'sType'       => 'VARCHAR(10)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'module version number',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXLOG'  => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXLOG',
            'sType'       => 'BIGINT(20)',
            'blNull'      => true,
            'sDefault'    => 'NULL',
            'sComment'    => 'profile log setting',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'PROF_OXVALUE'        => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXVALUE',
            'sType'       => 'LONGTEXT',
            'blNull'      => true,
            'sDefault'    => false,
            'sComment'    => 'profile settings',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'PROF_OXFOLDER'      => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXFOLDER',
            'sType'       => 'VARCHAR(70)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'folder name',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXSORT'      => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXSORT',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'sort ident',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXWRITEPROTECTION'      => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXWRITEPROTECTION',
            'sType'       => 'INT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'write protection',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXDATATYPE'      => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXDATATYPE',
            'sType'       => 'CHAR(10)',
            'blNull'      => false,
            'sDefault'    => 'default',
            'sComment'    => 'data type',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'PROF_OXTIMESTAMP'  => array(
            'sTableName'  => 'd3modprofile',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'last change',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'VARI_OXID'  => array(
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'VARI_OXPARENTID'  => array(
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXPARENTID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'VARI_OXNAME'  => array(
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXNAME',
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'VARI_OXVALUE'  => array(
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXVALUE',
            'sType'       => 'longtext',
            'blNull'      => true,
            'sDefault'    => false,
            'sComment'    => 'module settings',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'VARI_OXTIMESTAMP'  => array(
            'sTableName'  => 'd3_cfg_mod_variant',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'last change',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'CACHE_OXID'  => array(
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'CACHE_OXVALUE'  => array(
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXVALUE',
            'sType'       => 'blob',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'CACHE_OXTYPE'  => array(
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXTYPE',
            'sType'       => 'varchar(20)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'CACHE_OXLASTCHANGE'  => array(
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXLASTCHANGE',
            'sType'       => 'DATETIME',
            'blNull'      => false,
            'sDefault'    => '0000-00-00 00:00:00',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'CACHE_TIMESTAMP'  => array(
            'sTableName'  => 'd3cache',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'last change',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
    );

    public $aIndizes = array(
        'PRIMARY'  => array(
            'sTableName'  => 'd3_cfg_mod',
            'sType'   => d3database::INDEX_TYPE_PRIMARY,
            'aFields' => array(
                'OXID' => 'OXID',
            ),
            'blMultilang' => false,
        ),
        'OXSHOPID' => array(
            'sTableName'  => 'd3_cfg_mod',
            'sType'   => d3database::INDEX_TYPE_UNIQUE,
            'sName'   => 'OXSHOPID',
            'aFields' => array(
                'OXSHOPID' => 'OXSHOPID',
                'OXMODID'  => 'OXMODID',
            ),
            'blMultilang' => false,
        ),

        'PROF_PRIMARY'  => array(
            'sTableName'  => 'd3modprofile',
            'sType'   => d3database::INDEX_TYPE_PRIMARY,
            'aFields' => array(
                'OXID' => 'OXID',
            ),
            'blMultilang' => false,
        ),
        'PROF_OXSHOPID' => array(
            'sTableName'  => 'd3modprofile',
            'sType'   => d3database::INDEX_TYPE_INDEX,
            'sName'   => 'OXMODSHOPID',
            'aFields' => array(
                'OXSHOPID' => 'OXSHOPID',
                'OXMODID'  => 'OXMODID',
            ),
            'blMultilang' => false,
        ),

        'VARI_PRIMARY'  => array(
            'sTableName'  => 'd3_cfg_mod_variant',
            'sType'   => d3database::INDEX_TYPE_PRIMARY,
            'aFields' => array(
                'OXID' => 'OXID',
            ),
            'blMultilang' => false,
        ),
        'VARI_OXPARENTID' => array(
            'sTableName'  => 'd3_cfg_mod_variant',
            'sType'   => d3database::INDEX_TYPE_INDEX,
            'sName'   => 'OXPARENTID',
            'aFields' => array(
                'OXPARENTID' => 'OXPARENTID',
            ),
            'blMultilang' => false,
        ),

        'CACHE_PRIMARY'  => array(
            'sTableName'  => 'd3cache',
            'sType'   => d3database::INDEX_TYPE_PRIMARY,
            'aFields' => array(
                'OXID' => 'OXID',
            ),
            'blMultilang' => false,
        ),
    );

    public $aOldModuleFiles = array(
        '_d3modcfg/d3_modcfg_stub.php',
        '_d3modcfg/models/d3modcfg_cleanup.php',
        '_d3modcfg/models/d3_cfg_mod_update.php',
        '_d3modcfg/views/admin/tpl/d3_cfg_mod_bottom.tpl',
        '_d3modcfg/views/admin/tpl/d3_cfg_mod_inc.tpl',
    );

    protected $_aRefreshMetaModuleIds = array('d3modcfg_lib');

    /**
     * @return bool
     */
    public function checkModCfgMultiLangTable()
    {
        return $this->checkMultiLangTables('d3_cfg_mod');
    }

    /**
     * @return bool
     */
    public function checkConvertModCfgToMultiLangTable()
    {
        return $this->checkConvertToMultiLangTable('d3_cfg_mod');
    }

    /**
     * @return bool
     */
    public function registerModCfgMultiLangTable()
    {
        return $this->fixRegisterMultiLangTables('d3_cfg_mod');
    }

    /**
     * @return bool
     */
    public function convertModCfgToMultilangTable()
    {
        return $this->convertToMultilangTable('d3_cfg_mod');
    }

    /**
     * @return bool
     */
    public function checkModprofileMultiLangTable()
    {
        return $this->checkMultiLangTables('d3modprofile');
    }

    /**
     * @return bool
     */
    public function registerModprofileMultiLangTable()
    {
        return $this->fixRegisterMultiLangTables('d3modprofile');
    }

    /**
     * @return bool
     */
    public function checkModCfgVariantMultiLangTable()
    {
        return $this->checkMultiLangTables('d3_cfg_mod_variant');
    }

    /**
     * @return bool
     */
    public function registerModCfgVariantMultiLangTable()
    {
        return $this->fixRegisterMultiLangTables('d3_cfg_mod_variant');
    }

    /**
     * Bugfix for empty multishoptables from rev. 1244 in 4.3.4.0
     * @return bool
     */
    public function checkOxarticlesMultiShopTable()
    {
        $blRet = false;
        $sCurrentShopId = Registry::getConfig()->getShopId();
        /** @var Shop $oShop */
        foreach ($this->getShopList() as $oShop) {
            $this->_changeToShop($oShop->getId());
            if (false == in_array('oxarticles', Registry::getConfig()->getConfigParam('aMultiShopTables'))) {
                $blRet = true;
                break;
            };
        }
        $this->_changeToShop($sCurrentShopId);

        return $blRet;
    }

    /**
     * Bugfix for empty multishoptables from rev. 1244 in 4.3.4.0
     * @return bool
     */
    public function resetMultiShopTables()
    {
        $sCurrentShopId = Registry::getConfig()->getShopId();
        /** @var Shop $oShop */
        foreach ($this->getShopList() as $oShop) {
            $this->_changeToShop($oShop->getId());
            if (false == in_array('oxarticles', Registry::getConfig()->getConfigParam('aMultiShopTables'))) {
                $this->deleteMultiShopTables($oShop->getId());
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
     */
    public function registerModProfileMultiShopTable()
    {
        return $this->fixRegisterMultiShopTables('d3modprofile');
    }

    /**
     * @return bool
     */
    public function checkConvertModprofileToMultiLangTable()
    {
        return $this->checkConvertToMultiLangTable('d3modprofile');
    }

    /**
     * @return bool
     */
    public function convertModprofileToMultilangTable()
    {
        return $this->convertToMultilangTable('d3modprofile');
    }

    /**
     * @return bool
     */
    public function checkConvertModCfgVariantToMultiLangTable()
    {
        return $this->checkConvertToMultiLangTable('d3_cfg_mod_variant');
    }

    /**
     * @return bool
     */
    public function convertModCfgVariantToMultilangTable()
    {
        return $this->convertToMultilangTable('d3_cfg_mod_variant');
    }

    /**
     * @return bool
     */
    public function checkModCfgFields()
    {
        /** @var d3ShopCompatibilityAdapterHandler $oCompatibilityAdapter */
        $oCompatibilityAdapter = oxNew(d3ShopCompatibilityAdapterHandler::class);
        /** @var d3shopversionconverter $oShopVersionConverter */
        $oShopVersionConverter = oxNew(d3shopversionconverter::class);
        $sVersion = $oCompatibilityAdapter->getWOBetaShopVersion(
            $oShopVersionConverter->fixVersionToDefaultEdition(ShopVersion::getVersion())
        );

        if (strtoupper($oShopVersionConverter->fixEditionToDefaultEdition((oxNew(Facts::class))->getEdition())) == 'EE'
            && version_compare($sVersion, '5.2.0', '>=')
        ) {
            unset($this->aFields['PROF_OXSHOPINCL']);
            unset($this->aFields['PROF_OXSHOPEXCL']);
        }

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

    public function activateModCfgModule()
    {
        $blRet = true;

        if ($this->isModCfgModuleInactive()) {
            if ($this->hasExecute()) {
                /** @var Module $oModule */
                $sClassName = class_exists(\oxModule::class) ? \oxModule::class : Module::class;
                $oModule = oxNew($sClassName);
                $oModule->load($this->sModKey);


                /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
                $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
                $blRet = $oD3CompatibilityAdapterHandler->call('oxmodule__activate', array($oModule));
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
     * @return bool
     */
    public function hasToCleanOldLibs()
    {
        $blRet = false;
        /** @var d3_cfg_mod_cleaning $oCleaning */
        $oCleaning = oxNew(d3_cfg_mod_cleaning::class, $this);

        foreach ($oCleaning->getOldLibIds() as $sOldLibId) {
            if (d3_cfg_mod::isCallable() && d3_cfg_mod::isAvailable($sOldLibId)) {
                $blRet = true;
            }
        }

        return $blRet;
    }

    /**
     * @return bool
     */
    public function cleanOldLibs()
    {
        $blRet = true;

        if ($this->hasToCleanOldLibs()) {
            $this->setInitialExecMethod(__METHOD__);
            /** @var d3_cfg_mod_cleaning $oCleaning */
            $oCleaning = oxNew(d3_cfg_mod_cleaning::class, $this);
            $oCleaning->setExecute($this->hasExecute());
            $oCleaning->cleanOldModuleFiles();
            $oCleaning->cleanOldModuleTemplates();
            $oCleaning->deleteOldLibs();
            $oCleaning->cleanOldEnabledModules();
            $oCleaning->cleanOldDisabledModules();
            $oCleaning->cleanOldModulePaths();
            $oCleaning->cleanOldModuleVersions();
            $oCleaning->cleanOldModuleEvents();
            $oCleaning->transferSettings();
            $oCleaning->deleteSettings();

            if (is_array($oCleaning->getSql())) {
                foreach ($oCleaning->getSql() as $sSql) {
                    $this->setActionLog(
                        'SQL',
                        $sSql,
                        $this->getInitialExecMethod(__METHOD__)
                    );
                }
            }

            if (is_array($oCleaning->getInstructions())) {
                foreach ($oCleaning->getInstructions() as $sInstruction) {
                    $this->setActionLog(
                        'MSG',
                        $sInstruction,
                        $this->getInitialExecMethod(__METHOD__)
                    );
                }
            }
            $this->setUpdateBreak(true);
        }

        return $blRet;
    }
    
    /**
     * @return bool
     */
    public function hasDisabledD3VendorItem()
    {
        /** @var d3_cfg_mod_cleaning $oCleaning */
        $oCleaning = oxNew(d3_cfg_mod_cleaning::class, $this);
        return $oCleaning->hasDisabledD3VendorItem();
    }
    
    public function cleanD3VendorItem()
    {
        /** @var d3_cfg_mod_cleaning $oCleaning */
        $oCleaning = oxNew(d3_cfg_mod_cleaning::class, $this);
        $oCleaning->cleanD3VendorItem();
    }

    /**
     * @return bool true, if table is missing
     */
    public function checkModCfgTableExist()
    {
        return $this->_checkTableNotExist('d3_cfg_mod');
    }

    /**
     * @return bool
     */
    public function addModCfgTable()
    {
        $this->setInitialExecMethod(__METHOD__);
        $blRet  = $this->_addTable2(
            'd3_cfg_mod',
            $this->aFields,
            $this->aIndizes,
            'module configuration',
            'InnoDB'
        );

        return $blRet;
    }

    /**
     * @return bool true, if table has wrong engine
     */
    public function checkModCfgTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $aData = $oDbTable->getTableData('d3_cfg_mod');

        if (isset($aData) && count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB') {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function updateModCfgTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $blRet = $oDbTable->changeTableEngine('d3_cfg_mod', 'InnoDB');
        return $blRet;
    }

    /**
     * @return bool true, if table has wrong engine
     */
    public function checkModProfileTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $aData = $oDbTable->getTableData('d3modprofile');

        if (isset($aData) && count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB') {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function updateModProfileTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $blRet = $oDbTable->changeTableEngine('d3modprofile', 'InnoDB');
        return $blRet;
    }

    /**
     * @return bool true, if table has wrong engine
     */
    public function checkModCfgVariantTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $aData = $oDbTable->getTableData('d3_cfg_mod_variant');

        if (isset($aData) && count($aData) && isset($aData['ENGINE']) && $aData['ENGINE'] == 'InnoDB') {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function updateModCfgVariantTableEngine()
    {
        /** @var d3installdbtable $oDbTable */
        $oDbTable = oxNew(d3installdbtable::class, $this);
        $blRet = $oDbTable->changeTableEngine('d3_cfg_mod_variant', 'InnoDB');
        return $blRet;
    }

    /**
     * @return bool
     */
    public function hasModProfileExclInclItems()
    {
        return $this->_hasMoveExclInclItemsTo2Shop('d3modprofile');
    }

    /**
     * @return bool
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
     */
    public function hasNoModCfgItem()
    {
        /** @var d3installdbrecord $oDbRecord */
        $oDbRecord = oxNew(d3installdbrecord::class, $this);

        $blRet = false;
        foreach ($this->getShopList() as $oShop) {
            /** @var $oShop Shop */
            $aWhere = array(
                'oxmodid'       => $this->sModKey,
                'oxversion'     => $this->sModVersion,
                'oxshopid'      => $oShop->getId(),
            );

            $blRet = $oDbRecord->checkTableRecordNotExist('d3_cfg_mod', $aWhere);

            if ($blRet) {
                return $blRet;
            }
        }

        return $blRet;
    }

    /**
     * @return bool
     */
    public function updateModCfgItem()
    {
        $blRet = false;

        if ($this->hasNoModCfgItem()) {
            /** @var d3installdbrecord $oDbRecord */
            $oDbRecord = oxNew(d3installdbrecord::class, $this);
            $this->setInitialExecMethod(__METHOD__);

            foreach ($this->getShopList() as $oShop) {
                /** @var $oShop Shop */
                $aWhere = array(
                    'oxmodid'       => $this->sModKey,
                    'oxshopid'      => $oShop->getId(),
                    'oxversion'     => $this->sModVersion,
                );

                if ($oDbRecord->checkTableRecordNotExist('d3_cfg_mod', $aWhere)) {
                    // update don't use this property
                    unset($aWhere['oxversion']);
                    /** @var d3shopversionconverter $oShopVersionConverter */
                    $oShopVersionConverter = oxNew(d3shopversionconverter::class);

                    $aInsertFields = array(
                        'OXID'           => array (
                            'content'       => "md5('" . $this->sModKey . " " . $oShop->getId() . " de')",
                            'force_update'  => true,
                            'use_quote'     => false,
                        ),
                        'OXSHOPID'       => array (
                            'content'       => $oShop->getId(),
                            'force_update'  => true,
                            'use_quote'     => true,
                        ),
                        'OXMODID'        => array (
                            'content'       => $this->sModKey,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ),
                        'OXNAME'         => array (
                            'content'       => $this->sModName,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ),
                        'OXACTIVE'       => array (
                            'content'       => "1",
                            'force_update'  => true,
                            'use_quote'     => false,
                        ),
                        'OXBASECONFIG'   => array (
                            'content'       => $this->sBaseConf,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ),
                        'OXSERIAL'   => array (
                            'content'       => "",
                            'force_update'  => false,
                            'use_quote'     => true,
                        ),
                        'OXINSTALLDATE'  => array (
                            'content'       => "NOW()",
                            'force_update'  => true,
                            'use_quote'     => false,
                        ),
                        'OXVERSION'         => array (
                            'content'       => $this->sModVersion,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ),
                        'OXSHOPVERSION'  => array (
                            'content'       => $oShopVersionConverter->fixEditionToDefaultEdition((oxNew(Facts::class))->getEdition()),
                            'force_update'  => true,
                            'use_quote'     => true,
                        ),
                        'OXREQUIREMENTS' => array (
                            'content'       => $this->sRequirements,
                            'force_update'  => true,
                            'use_quote'     => true,
                        ),
                        'OXVALUE'        => array(
                            'content'       => $this->sBaseValue,
                            'force_update'  => false,
                            'use_quote'     => true,
                        ),
                    );

                    $this->setInitialExecMethod(__METHOD__);
                    $blRet  = $this->_updateTableItem2('d3_cfg_mod', $aInsertFields, $aWhere);
                }
            }
        }
        return $blRet;
    }

    /**
     * @return bool true, if table is missing
     */
    public function checkModProfileTableExist()
    {
        return $this->_checkTableNotExist('d3modprofile');
    }

    /**
     * @return bool
     */
    public function addModProfileTable()
    {
        $blRet = true;

        if ($this->checkModProfileTableExist()) {
            $this->setInitialExecMethod(__METHOD__);

            /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
            $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
            /** @var d3shopversionconverter $oShopVersionConverter */
            $oShopVersionConverter = oxNew(d3shopversionconverter::class);
            $sShopVersion = $oD3CompatibilityAdapterHandler->getWOBetaShopVersion(
                $oShopVersionConverter->fixVersionToDefaultEdition(ShopVersion::getVersion())
            );

            if (strtoupper($oShopVersionConverter->fixEditionToDefaultEdition((oxNew(Facts::class))->getEdition())) == 'EE'
                && version_compare($sShopVersion, '5.2.0', '>=')
            ) {
                unset($this->aFields['PROF_OXSHOPINCL']);
                unset($this->aFields['PROF_OXSHOPEXCL']);
            }

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
     */
    public function checkModCfgVariantTableExist()
    {
        return $this->_checkTableNotExist('d3_cfg_mod_variant');
    }

    /**
     * @return bool
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
     */
    public function checkCacheTableExist()
    {
        return $this->_checkTableNotExist('d3cache');
    }

    /**
     * @return bool
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
     */
    public function hasDuplicateBlockItem()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select(1)
            ->from('oxtplblocks', 'tbl1')
            ->innerJoin('tbl1', 'oxtplblocks', 'tbl2', 'tbl2.oxshopid = tbl1.oxshopid AND 
                tbl2.oxtemplate = tbl1.oxtemplate AND
                tbl2.oxblockname = tbl1.oxblockname AND
                tbl2.oxfile = tbl1.oxfile AND
                tbl2.oxmodule = tbl1.oxmodule AND
                tbl2.oxid != tbl1.oxid')
            ->groupBy(1)
            ->setMaxResults(1);
        $sSelect = $oQB->getSQL();

        return (bool) DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getOne($sSelect);
    }

    /**
     * @return bool
     */
    public function deleteDuplicateBlockItems()
    {
        $blRet = true;

        if (!$this->hasDuplicateBlockItem()) {
            return $blRet;
        }

        $sMessage = '# '.Registry::getLang()->translateString('D3_CFG_MOD_UPDATE_JOB_SQL').PHP_EOL;

        if (count(DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll(
            "SHOW INDEX FROM oxtplblocks WHERE Column_name = 'D3DELETEID'"
        )) == 0) {
            $sMessage .= "
            ALTER TABLE oxtplblocks
                DROP PRIMARY KEY;

            ALTER TABLE oxtplblocks ADD `D3DELETEID` INT NOT NULL AUTO_INCREMENT ,
            ADD PRIMARY KEY (`D3DELETEID`);
            ";
        }

        $sMessage .= "
            DELETE tbl1
            FROM `oxtplblocks` tbl1
            INNER JOIN `oxtplblocks` tbl2 ON
                tbl2.oxshopid = tbl1.oxshopid AND
                tbl2.oxtemplate = tbl1.oxtemplate AND
                tbl2.oxblockname = tbl1.oxblockname AND
                tbl2.oxfile = tbl1.oxfile AND
                tbl2.oxmodule = tbl1.oxmodule AND
                tbl2.oxid != tbl1.oxid
            WHERE
                tbl1.D3DELETEID > tbl2.D3DELETEID;

            ALTER TABLE `oxtplblocks`
                DROP `D3DELETEID`;

            ALTER TABLE `oxtplblocks`
                ADD PRIMARY KEY (`OXID`);
        ";

        // switch to "manualyinstall", we require a confirm form
        $sPrevAction = $this->setTemporaryAction('manualyinstall');

        if (false == $this->hasExecute() || $sPrevAction == 'autoinstall') {
            $this->setActionLog('MSG', $sMessage, $this->getInitialExecMethod(__METHOD__));
            $this->setUpdateBreak(true);
        } else {
            // switch back to user selected action
            $this->resetTemporaryAction();
        }

        return $blRet;
    }

    /**
     * @return bool
     */
    public function hasUnregisteredFiles()
    {
        return $this->_hasUnregisteredFiles($this->sModKey, array('blocks', 'd3FileRegister'));
    }

    /**
     * @return bool
     */
    public function showUnregisteredFiles()
    {
        return $this->_showUnregisteredFiles($this->sModKey, array('blocks', 'd3FileRegister'));
    }
}
