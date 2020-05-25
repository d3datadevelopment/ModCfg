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
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Log;

use D3\ModCfg\Application\Model\d3bitmask;
use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Parametercontainer\Registry as D3ModCfgRegistry;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Modules\Application\Controller\d3_oxshopcontrol_modcfg_extension;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\Eshop\Core\Email;
use OxidEsales\Eshop\Core\ShopControl;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use Doctrine\DBAL\DBALException;
use Psr\Log\LoggerTrait;

class d3log extends BaseModel implements d3LogInterface
{
    use LoggerTrait;

    // single log levels
    const EMERGENCY = d3LogLevel::EMERGENCY; // Int 0, Bit 1
    const ALERT = d3LogLevel::ALERT; // Int 1, Bit 2
    const CRITICAL = d3LogLevel::CRITICAL; // Int 2, Bit 4
    const ERROR = d3LogLevel::ERROR; // Int 3 Bit 8
    const WARNING = d3LogLevel::WARNING; // Int 4 Bit 16
    const NOTICE = d3LogLevel::NOTICE; // Int 5 Bit 32
    const INFO = d3LogLevel::INFO; // Int 6 Bit 64
    const DEBUG = d3LogLevel::DEBUG; // Int 7 Bit 128
    const TEST = d3LogLevel::TEST; // Int 8 Bit 256
    const NONE = d3LogLevel::NONE; // Int 12 Bit 4096

    // grouped log levels
    const ERROR_AND_ABOVE = d3LogLevel::ERROR_AND_ABOVE; // Bit 15;
    const WARNING_AND_ABOVE = d3LogLevel::WARNING_AND_ABOVE; // Bit 31;
    const NOTICE_AND_ABOVE = d3LogLevel::NOTICE_AND_ABOVE; // Bit 63;
    const INFO_AND_ABOVE = d3LogLevel::INFO_AND_ABOVE; // Bit 127;
    const ALL = d3LogLevel::ALL; // Bit 4095  // accept 3 additional levels

    public $aLogTypes = array(
        'EMERGENCY' => d3LogLevel::EMERGENCY,
        'ALERT'     => d3LogLevel::ALERT,
        'CRITICAL'  => d3LogLevel::CRITICAL,
        'ERROR'     => d3LogLevel::ERROR,
        'WARNING'   => d3LogLevel::WARNING,
        'NOTICE'    => d3LogLevel::NOTICE,
        'INFO'      => d3LogLevel::INFO,
        'DEBUG'     => d3LogLevel::DEBUG,
        'TEST'      => d3LogLevel::TEST,
    );

    public $aLogGroups = array(
        'info'      => array(
            'INFO'      => true,
            'NOTICE'    => true,
            'WARNING'   => true,
            'EMERGENCY' => true,
            'ALERT'     => true,
            'CRITICAL'  => true,
            'ERROR'     => true,
        ),
        'notice'    => array(
            'NOTICE'    => true,
            'WARNING'   => true,
            'EMERGENCY' => true,
            'ALERT'     => true,
            'CRITICAL'  => true,
            'ERROR'     => true,
        ),
        'warning'   => array(
            'WARNING'   => true,
            'EMERGENCY' => true,
            'ALERT'     => true,
            'CRITICAL'  => true,
            'ERROR'     => true,
        ),
        'error'     => array(
            'EMERGENCY' => true,
            'ALERT'     => true,
            'CRITICAL'  => true,
            'ERROR'     => true,
        ),
        'none'      => array(
        ),
    );

    /**
     * Object registry provides storage for shared objects
     *
     * @var array
     */
    protected static $_aRegistry = array();

    protected $_blStandAloneUse = false; // set this, if other libraries aren't available
    protected $_sClassName = self::class;

    protected $_sCoreTbl = 'd3log'; // bc
    protected $_sCoreTable = 'd3log';

    protected static $_sD3CoreTable = 'd3log';

    public $_iLogType = d3LogLevel::EMERGENCY;

    private $_sLogSetId = 'd3modcfg_lib';

    public $sModID;

    public $sProfileID;

    public $aD3TypeList = array();

    public $aD3ModIdList = array();

    public $aD3ClassList = array();

    protected $_aSkipSaveFields = array('oxcounter', 'oxtimestamp');

    protected $_iInfoMailLogMessageLength = 40;

    public $pwrsearchval;

    /**
     * Adds a new variable to the Registry.
     *
     * @param string $key   Name of the variable
     * @param mixed  $value Value of the variable
     *
     * @return bool
     */
    public static function set($key, $value)
    {
        self::$_aRegistry[$key] = $value;

        return true;
    }

    /**
     * Tests if given $key exists in registry
     *
     * @param string $key
     *
     * @return bool
     */
    public static function has($key)
    {
        return isset(self::$_aRegistry[$key]);
    }

    /**
     * Returns the value of the specified $key in the Registry.
     *
     * @param string $sModId
     * @param int|bool $iLogType
     *
     * @return d3log|false
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public static function get($sModId, $iLogType = false)
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);

        if (false == self::isCallable()) {
            return false;
        }

        if (self::has($sModId)) {
            if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);

            return self::$_aRegistry[$sModId];
        } else {
            /** @var $oLog d3log */
            $oLog =oxNew(d3log::class, $sModId);

            if (false == isset($iLogType) || $iLogType === false) {
                $iLogType = $oLog->getLogType();
            }
            $oLog->setModId($sModId);
            $oLog->setLogType($iLogType);
            self::set($sModId, $oLog);

            if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);

            return self::$_aRegistry[$sModId];
        }
    }

    /**
     * Returns the whole Registry as an array.
     *
     * @return array Whole Registry
     */
    public static function getAll()
    {
        return self::$_aRegistry;
    }

    /**
     * Removes a variable from the Registry.
     *
     * @param string $key Name of the variable
     *
     * @return bool
     */
    public static function remove($key)
    {
        if (self::has($key)) {
            unset(self::$_aRegistry[$key]);

            return true;
        }

        return false;
    }

    /**
     * Removes all variables from the Registry.
     *
     * @return void
     */
    public static function removeAll()
    {
        self::$_aRegistry = array();

        return;
    }

    /**
     * constructor
     */
    public function __construct()
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);
        parent::__construct();

        $this->init($this->_sCoreTable);
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);
    }

    /**
     * @param string $sModId
     *
     * @return d3log
     */
    public function setModId($sModId)
    {
        $this->sModID = $sModId;

        return $this;
    }

    /**
     * @return string
     */
    public function d3getModId()
    {
        return $this->sModID;
    }

    /**
     * @param string $sProfileId
     *
     * @return d3log
     */
    public function setProfileId($sProfileId)
    {
        $this->sProfileID = $sProfileId;

        return $this;
    }

    /**
     * @return string
     */
    public function d3getProfileId()
    {
        return $this->sProfileID;
    }

    /**
     * getLogType(d3log::INFO)
     * getLogType(d3log::INFO, d3log::ERROR);
     *
     * @param int      $iLogType1
     * @param int|null $iLogType2
     * @param int|null $iLogType3
     *
     * @return d3log
     */
    public function setLogType($iLogType1, $iLogType2 = null, $iLogType3 = null)
    {
        $aArgs = func_get_args();
        $bitmask = oxNew(d3bitmask::class);

        unset($iLogType1);
        unset($iLogType2);
        unset($iLogType3);

        $aLog = array();
        foreach ($aArgs as $iLogType) {
            // espacially for combined logtypes
            foreach ($this->aLogTypes as $iGenLogType) {
                if ($bitmask->isBitSet($iLogType, $this->getLogBit($iGenLogType))) {
                    $aLog[$this->getErrorModeName($iGenLogType)] = 1;
                }
            }
        }

        if (count($aLog)) {
            $this->_iLogType = $this->getLogTypeByArray($aLog);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getLogType()
    {
        return $this->_iLogType;
    }

    /**
     * @param int $iLogType
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param string|null $sAction
     * @param string|null $mText
     * @param bool $blDie
     *
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function log(
        $iLogType = d3LogLevel::EMERGENCY,
        $sClass = __CLASS__,
        $sFnc = __FUNCTION__,
        $iLine = __LINE__,
        $sAction = null,
        $mText = null,
        $blDie = false
    ) {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);

        $sSessID = Registry::getSession()->getId();
        $this->sModID ? $sModID = $this->sModID : $sModID = 'empty';
        $mText = is_string($mText) ? $mText : print_r($mText, true);
        //$this->sModID definiert den Namen des Moduls, das geloggt werden soll -> tabellenfeld oxmodid
        // Beide Objektwerte sollten immer nach der Objekterstellung nach 'oxNew' gesetzt werden

        if ($this->getErrorMode($iLogType)) {
            $this->setId();
            $aContent = array(
                'oxshopid'    => Registry::getConfig()->getShopId(),
                'oxsessid'    => $sSessID,
                'oxlogtype'   => strtolower($this->getErrorModeName($iLogType)),
                'oxtime'      => date('Y-m-d H:i:s'),
                'oxmodid'     => $sModID,
                'oxprofileid' => $this->d3getProfileId() ? $this->d3getProfileId() : 'none',
                'oxclass'     => $sClass,
                'oxfnc'       => $sFnc,
                'oxline'      => $iLine,
                'oxaction'    => $sAction,
                'oxtext'      => $mText,
            );

            $this->assign($aContent);
            $this->_insert();
            $this->_handleMailMessage();
            D3ModCfgRegistry::getInstance()->add($this);
        }

        $this->_handleDie($mText, $blDie);

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);

        return $this;
    }

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param null $sAction
     * @param null $mText
     * @param bool $blDie
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function emergency($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this->log(d3LogLevel::EMERGENCY, $sClass, $sFnc, $iLine, $sAction, $mText, $blDie);
    }

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param null $sAction
     * @param null $mText
     * @param bool $blDie
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function alert($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this->log(d3LogLevel::ALERT, $sClass, $sFnc, $iLine, $sAction, $mText, $blDie);
    }

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param null $sAction
     * @param null $mText
     * @param bool $blDie
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function critical($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this->log(d3LogLevel::CRITICAL, $sClass, $sFnc, $iLine, $sAction, $mText, $blDie);
    }

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param null $sAction
     * @param null $mText
     * @param bool $blDie
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function error($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this->log(d3LogLevel::ERROR, $sClass, $sFnc, $iLine, $sAction, $mText, $blDie);
    }

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param null $sAction
     * @param null $mText
     * @param bool $blDie
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function warning($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this->log(d3LogLevel::WARNING, $sClass, $sFnc, $iLine, $sAction, $mText, $blDie);
    }

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param null $sAction
     * @param null $mText
     * @param bool $blDie
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function notice($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this->log(d3LogLevel::NOTICE, $sClass, $sFnc, $iLine, $sAction, $mText, $blDie);
    }

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param null $sAction
     * @param null $mText
     * @param bool $blDie
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function info($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this->log(d3LogLevel::INFO, $sClass, $sFnc, $iLine, $sAction, $mText, $blDie);
    }

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param null $sAction
     * @param null $mText
     * @param bool $blDie
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function debug($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this->log(d3LogLevel::DEBUG, $sClass, $sFnc, $iLine, $sAction, $mText, $blDie);
    }

    /**
     * @param string $sClass
     * @param string $sFnc
     * @param int $iLine
     * @param null $sAction
     * @param null $mText
     * @param bool $blDie
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function test($sClass = __CLASS__, $sFnc = __FUNCTION__, $iLine = __LINE__, $sAction = null, $mText = null, $blDie = false)
    {
        return $this->log(d3LogLevel::TEST, $sClass, $sFnc, $iLine, $sAction, $mText, $blDie);
    }

    /**
     * @param int $iLogType
     *
     * @return int
     */
    public function getLogBit($iLogType)
    {
        return oxNew(d3bitmask::class)->getIntByBitPosition($iLogType);
    }

    /**
     * @return array
     */
    public function getErrorModes()
    {
        // $iError = $this->getLogType();

        $aLogTypeStatus = array();
        foreach ($this->aLogTypes as $sLogType => $iLogType) {
            $aLogTypeStatus[$sLogType] = $this->getErrorMode($iLogType);
        }

        return $aLogTypeStatus;
    }

    /**
     * @param int $iErrorMode
     *
     * @return bool
     */
    public function getErrorMode($iErrorMode)
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);

        $iError   = $this->getLogType();
        $iLogBit  = $this->getLogBit($iErrorMode);
        $blReturn = oxNew(d3bitmask::class)->isBitSet($iError, $iLogBit);

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);

        return $blReturn;
    }

    /**
     * @param $sStatus
     * @param $oSet
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogStatus($sStatus, $oSet)
    {
        unset($oSet);

        if ($this->getLogSet()->getValue('blLog_useExtendedLogging')) {
            return $this->_getLogStatusExtended($sStatus);
        } else {
            if (strtoupper($sStatus) == 'DEBUG' ||
                strtoupper($sStatus) == 'TEST'
            ) {
                return $this->_getLogStatusExtended($sStatus);
            }

            $aLogLevelArray = $this->_convertLogLevelToModeArray($sStatus);
            $aLogLevelKeys  = array_keys($aLogLevelArray);

            foreach ($this->getAllLogTypes() as $sErrorName => $iLogType) {
                if (in_array($sErrorName, $aLogLevelKeys) && false == $this->getErrorMode($iLogType)) {
                    return false;
                } elseif (false == in_array($sErrorName, $aLogLevelKeys) && $this->getErrorMode($iLogType)) {
                    return false;
                }
            }

            return true;
        }
    }

    /**
     * @param string $sStatus
     *
     * @return bool
     */
    protected function _getLogStatusExtended($sStatus)
    {
        $iErrorMode = $this->getErrorModeId($sStatus);

        return $this->getErrorMode($iErrorMode);
    }

    /**
     * @param int $iErrorMode
     *
     * @return string
     */
    public function getErrorModeName($iErrorMode)
    {
        $aModTypeList = array_keys($this->aLogTypes);

        return $aModTypeList[$iErrorMode];
    }

    /**
     * @param string $sErrorName
     *
     * @return int
     */
    public function getErrorModeId($sErrorName)
    {
        $aModTypeList = array_keys($this->aLogTypes);
        $iErrorMode   = array_search(strtoupper($sErrorName), $aModTypeList);

        return $iErrorMode;
    }

    /**
     * @param array $aErrorModes
     *
     * @return int
     */
    public function getLogTypeByArray($aErrorModes = array())
    {
        $aErrorModes = $this->_resolveArrayByLogTypes($aErrorModes);

        return oxNew(d3bitmask::class)->getIntByBitMask($aErrorModes);
    }

    /**
     * @param array $aErrorModes
     *
     * @return array
     */
    protected function _resolveArrayByLogTypes($aErrorModes)
    {
        $aNewTypeArray = array();
        $aErrorModes   = array_change_key_case($aErrorModes, CASE_UPPER);

        foreach (array_keys($this->aLogTypes) as $sTypeName) {
            if (isset($aErrorModes[strtoupper($sTypeName)])) {
                $aNewTypeArray[$sTypeName] = $aErrorModes[strtoupper($sTypeName)];
            } else {
                $aNewTypeArray[$sTypeName] = false;
            }
        }

        return $aNewTypeArray;
    }

    /**
     * @param int $iType
     *
     * @return int
     */
    public function addLogType($iType)
    {
        $this->setLogType(oxNew(d3bitmask::class)->addBit($this->getLogType(), $this->getLogBit($iType)));

        return $this->getLogType();
    }

    /**
     * @param int $iType
     *
     * @return int
     */
    public function removeLogType($iType)
    {
        $this->setLogType(oxNew(d3bitmask::class)->removeBit($this->getLogType(), $this->getLogBit($iType)));

        return $this->getLogType();
    }

    /**
     * @return int
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function convertAdminLogSettings()
    {
        $aLog = array();
        if ($this->getLogSet()->getValue('blLog_useExtendedLogging') &&
            Registry::get(Request::class)->getRequestEscapedParameter('logtypes') &&
            is_array(Registry::get(Request::class)->getRequestEscapedParameter('logtypes'))
        ) {
            foreach (Registry::get(Request::class)->getRequestEscapedParameter('logtypes') as $iType => $blStatus) {
                $aLog[$this->getErrorModeName($iType)] = (bool)$blStatus;
            }
        } elseif (Registry::get(Request::class)->getRequestEscapedParameter('loglevel') !== null) {
            $aLog = $this->_convertLogLevelToModeArray(Registry::get(Request::class)->getRequestEscapedParameter('loglevel'));

            $aLogTypes = Registry::get(Request::class)->getRequestEscapedParameter('logtypes');

            /** set DEBUG mode */
            if ($aLogTypes && is_array($aLogTypes) && isset($aLogTypes['7'])) {
                $aLog['DEBUG'] = $aLogTypes['7'] ? true : false;
            }

            /** set TEST mode */
            if ($aLogTypes && is_array($aLogTypes) && isset($aLogTypes['8'])) {
                $aLog['TEST'] = $aLogTypes['8'] ? true : false;
            }
        } else {
            return false;
        }

        if (count($aLog)) {
            return $this->getLogTypeByArray($aLog);
        }

        return 0;
    }

    /**
     * @param string $sLogLevel
     *
     * @return array
     */
    protected function _convertLogLevelToModeArray($sLogLevel)
    {
        $aLog = $this->aLogGroups[strtolower($sLogLevel)];

        if (!is_array($aLog)) {
            $aLog = array();
        }

        return $aLog;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function setBacktraceLog()
    {
        $this->Log();
        debug_print_backtrace();
    }

    /**
     * @param null $blForceCoreTable
     *
     * @return string
     */
    public function getSqlActiveSnippet($blForceCoreTable = null)
    {
        unset($blForceCoreTable);
        return "1";
    }

    /**
     * check, if mailsend has to be intitiated
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _checkMailMessage()
    {
        if ($this->_checkMailMessageSlot(1) || $this->_checkMailMessageSlot(2)) {
            return true;
        }

        return false;
    }

    /**
     * @param $iSlot
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _checkMailMessageSlot($iSlot)
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);

        $sAdrFieldName = 'sLog_messageadr'.$iSlot;
        $sErrLevelFieldName = 'sLog_messageerrlevel'.$iSlot;
        $sTimeStampFieldName = 'sLog_messagetimestamp'.$iSlot;

        if ($this->getLogSet()->getValue($sAdrFieldName) &&
            $this->getLogSet()->getValue($sErrLevelFieldName) &&
            (false == $this->getLogSet()->getValue($sTimeStampFieldName) ||
                ($this->getLogSet()->getValue($sTimeStampFieldName) < $this->_getLastReqMailTimeStamp($iSlot))
            )
        ) {
            if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);
            return true;
        }

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);
        return false;
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getUsedMailMessageSlots()
    {
        $sAdrBaseFieldName = 'sLog_messageadr';
        $aSlots = array();

        for ($i = 1; $i < 100; $i++) {
            $sAdrFieldName = $sAdrBaseFieldName.$i;
            if (strlen($this->getLogSet()->getValue($sAdrFieldName))) {
                $aSlots[] = $i;
            } else {
                break;
            };
        }

        return $aSlots;
    }

    /**
     * get timestamp of last required mailsend time
     * @param $iSlot
     * @return int
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _getLastReqMailTimeStamp($iSlot)
    {
        switch ($this->getLogSet()->getValue('sLog_messageintervaltype' . $iSlot)) {
            case 'hour':
                $iDiff = 60 * 60;
                break;
            case 'day':
                $iDiff = 60 * 60 * 24;
                break;
            case 'minute':
                $iDiff = 60;
                break;
            default:
                $iDiff = 0;
        }

        $iDiff *= $this->getLogSet()->getValue('sLog_messageinterval' . $iSlot);

        return time() - $iDiff;
    }

    /**
     * send info mail to setted mail adresses
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _sendMailMessage()
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);
        $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);

        foreach ($this->getUsedMailMessageSlots() as $iSlotId) {
            if ($this->_checkMailMessageSlot($iSlotId)) {
                $aErrorStatus = $oDb->getAll($this->_getMailDataSelect($iSlotId));

                if (count($aErrorStatus)) {
                    /** @var $oEMail Email */
                    $oEMail = oxNew(Email::class);
                    $this->_sendLogInfoMail(
                        $oEMail,
                        $this->getLogSet()->getValue('sLog_messageadr'.$iSlotId),
                        $this->_getMailSubject(),
                        $this->_getMailContent($aErrorStatus)
                    );

                    $this->getLogSet()->setValue('sLog_messagetimestamp'.$iSlotId, time());
                    $this->getLogSet()->save();
                }
            }
        }

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);
    }

    /**
     * @param Email $oEmail
     * @param $sTo
     * @param $sSubject
     * @param $sBody
     */
    protected function _sendLogInfoMail($oEmail, $sTo, $sSubject, $sBody)
    {
        $oShop = Registry::getConfig()->getActiveShop();

        if (false == ($sFromAddress = Registry::getConfig()->getConfigParam('sLogInfoMailFromAddress'))) {
            $sFromAddress = $oShop->getFieldData('oxorderemail');
        }

        $oEmail->setFrom($sFromAddress, $oShop->__get('oxshops__oxname')->getRawValue());
        $oEmail->setSmtp($oShop);

        if (is_array($sTo)) {
            foreach ($sTo as $sAddress) {
                $oEmail->setRecipient($sAddress, "");
                $oEmail->setReplyTo($sAddress, "");
            }
        } else {
            $oEmail->setRecipient($sTo, "");
            $oEmail->setReplyTo($sTo, "");
        }

        //may be changed later
        $oEmail->isHtml(true);

        $oEmail->setSubject($sSubject);
        $oEmail->setBody($sBody);

        $oEmail->send();
    }

    /**
     * create select to get status overview from database
     *
     * @param int $iSlot mail send configuration slot
     *
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _getMailDataSelect($iSlot)
    {
        $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);

        $sWhere = $this->getLogSet()->getValue('sLog_messagetimestamp' . $iSlot) ? "oxtime > " . $oDb->quote(
            date('Y-m-d H:i:s', $this->getLogSet()->getValue('sLog_messagetimestamp' . $iSlot))
        ) . " " : '1 ';

        $aLevelFilter = array();
        switch ($this->getLogSet()->getValue('sLog_messageerrlevel' . $iSlot)) {
            case 'warning':
                $aLevelFilter = array('emergency', 'alert', 'critical', 'error', 'warning');
                break;
            case 'error':
                $aLevelFilter = array('emergency', 'alert', 'critical', 'error');
                break;
            case 'critical':
                $aLevelFilter = array('emergency', 'alert', 'critical');
                break;
            case 'alert':
                $aLevelFilter = array('emergency', 'alert');
                break;
            case 'emergency':
                $aLevelFilter = array('emergency');
                break;
        }

        if (count($aLevelFilter)) {
            $sWhere .= ' AND oxlogtype IN ("' . implode('","', $aLevelFilter) . '") ';
        }

        $sSelect = "SELECT count(oxlogtype) as counter, oxlogtype, oxmodid, CONCAT(substr(oxtext, 1, ".$this->_iInfoMailLogMessageLength."),'...') as text
                    FROM " . $this->getViewName() . "
                    WHERE " . $sWhere . " AND oxlogtype IS NOT NULL
                    GROUP BY oxmodid, oxlogtype, text
                    ORDER BY FIELD(oxlogtype,".$this->getLogTypePriorityList4Query()."), counter DESC";

        return $sSelect;
    }

    /**
     * generate subject for owner info mail
     *
     * @return string
     */
    protected function _getMailSubject()
    {
        $oShop = Registry::getConfig()->getActiveShop();
        $iDefaultLang = Registry::getConfig()->getConfigParam('sDefaultLang');
        $oLang = Registry::getLang();

        $sText = sprintf(
            $oLang->translateString('D3_LOGMAIL_SUBJECT', $iDefaultLang, true),
            $oShop->getFieldData('oxname'),
            $oShop->getFieldData('oxurl')
        );

        return $sText;
    }

    /**
     * generate content by database data for owner info mail
     *
     * @param array $aStatus status data
     *
     * @return string
     */
    protected function _getMailContent($aStatus)
    {
        $iDefaultLang = Registry::getConfig()->getConfigParam('sDefaultLang');
        $oLang = Registry::getLang();

        $sText = $oLang->translateString('D3_LOGMAIL_HEADLINE', $iDefaultLang, true);
        $sText .= "<br><br>";

        $sText .= "<table style='border: 1px solid silver;'>";
        foreach ($aStatus as $aUniqueStatus) {
            $aUniqueStatus = array_change_key_case($aUniqueStatus, CASE_UPPER);
            $sText .= "<tr><td>".$aUniqueStatus['COUNTER']."x</td>";
            $sText .= "<td>".$aUniqueStatus['OXLOGTYPE']."</td>";
            $sText .= "<td>".sprintf(
                $oLang->translateString('D3_LOGMAIL_INMODULE', $iDefaultLang, true),
                $aUniqueStatus['OXMODID']
            )."</td>";
            $sText .= "<td>".str_replace(array(chr(10), chr(13)), '', $aUniqueStatus['TEXT'])."</td></tr>";
        }
        $sText .= "</table>";

        $sText .= "<br>";
        $sText .= $oLang->translateString('D3_LOGMAIL_DESC', $iDefaultLang, true)."<br><br>";
        $sText .= $oLang->translateString('D3_LOGMAIL_LEGENDE', $iDefaultLang, true);
        $sText .= $oLang->translateString('D3_LOGTYPE_DESC', $iDefaultLang, true);

        return $sText;
    }

    /**
     * @param bool $blGetDebug
     * @param bool $blGetTestMode
     *
     * @return array
     */
    public function getAllLogTypes($blGetDebug = false, $blGetTestMode = false)
    {
        $aTypes = $this->aLogTypes;

        if (false == $blGetDebug) {
            unset($aTypes['DEBUG']);
        }

        if (false == $blGetTestMode) {
            unset($aTypes['TEST']);
        }

        return $aTypes;
    }

    /**
     * @param string $sModId
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogTypeList($sModId = '')
    {
        if (false == $this->aD3TypeList || false == count($this->aD3TypeList)) {
            $sWhere = $sModId ? 'oxmodid LIKE ' . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote('%' . $sModId . '%') : '1';

            $sSelect = "SELECT DISTINCT " . $this->getCoreTableName() . ".oxlogtype
                        FROM " . $this->getCoreTableName() . "
                        WHERE $sWhere ORDER BY FIELD(oxlogtype,".$this->getLogTypePriorityList4Query().")";

            $this->aD3TypeList = array();
            $aRecords          = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll($sSelect);

            if ($aRecords && is_array($aRecords) && count($aRecords)) {
                foreach ($aRecords as $aRecord) {
                    $aRecord             = array_change_key_case($aRecord, CASE_UPPER);
                    $this->aD3TypeList[] = $aRecord['OXLOGTYPE'];
                }
            }
        }

        return $this->aD3TypeList;
    }

    public function getLogTypePriorityList()
    {
        return array_keys($this->aLogTypes);
    }

    /**
     * @return string
     * @throws DatabaseConnectionException
     */
    public function getLogTypePriorityList4Query()
    {
        $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);
        return implode(',', array_map(array($oDb, 'quote'), $this->getLogTypePriorityList()));
    }

    /**
     * @param string $sModId
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getModIdList($sModId = '')
    {
        if (false == $this->aD3ModIdList || false == count($this->aD3ModIdList)) {
            if ($sModId) {
                $sWhere = $this->getCoreTableName() . '.oxmodid
                        LIKE ' . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote('%' . $sModId . '%') . ' ';
            } else {
                $sWhere = ' 1 ';
            }

            $sSelect = "SELECT DISTINCT " . $this->getCoreTableName() . ".oxmodid
                        FROM " . $this->getCoreTableName() . "
                        WHERE $sWhere ORDER BY " . $this->getCoreTableName() . ".oxmodid";

            $this->aD3ModIdList = array();
            $aRecords           = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll($sSelect);

            if ($aRecords && is_array($aRecords) && count($aRecords)) {
                foreach ($aRecords as $aRecord) {
                    $aRecord              = array_change_key_case($aRecord, CASE_UPPER);
                    $this->aD3ModIdList[] = $aRecord['OXMODID'];
                }
            }
        }

        return $this->aD3ModIdList;
    }

    /**
     * @param string $sModId
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getClassList($sModId = '')
    {
        if (false == $this->aD3ClassList || false == count($this->aD3ClassList)) {
            if ($sModId) {
                $sWhere = $this->getCoreTableName() . '.oxmodid
                LIKE ' . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote('%' . $sModId . '%') . ' ';
            } else {
                $sWhere = ' 1 ';
            }

            $sSelect = "SELECT DISTINCT " . $this->getCoreTableName() . ".oxclass
                        FROM " . $this->getCoreTableName() . "
                        WHERE $sWhere ORDER BY " . $this->getCoreTableName() . ".oxclass";

            $this->aD3ClassList = array();
            $aRecords           = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll($sSelect);

            if ($aRecords && is_array($aRecords) && count($aRecords)) {
                foreach ($aRecords as $aRecord) {
                    $aRecord              = array_change_key_case($aRecord, CASE_UPPER);
                    $this->aD3ClassList[] = $aRecord['OXCLASS'];
                }
            }
        }

        return $this->aD3ClassList;
    }

    /**
     * @param bool $sModId
     * @param bool $sType
     * @param bool $sFromTime
     * @param bool $sToTime
     * @return string
     * @throws DatabaseConnectionException
     */
    protected function _getDelSql($sModId = false, $sType = false, $sFromTime = false, $sToTime = false)
    {
        $sSql = "DELETE FROM " . $this->getCoreTableName() . " WHERE ";

        $sModId = $sModId ? $sModId : Registry::get(Request::class)->getRequestEscapedParameter('delete_oxmodid');
        if ($sModId) {
            $sSql .= $this->getCoreTableName() . ".oxmodid = " . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote(
                $sModId
            ) . " AND ";
        }

        $sType = $sType ? $sType : Registry::get(Request::class)->getRequestEscapedParameter('delete_oxtype');
        if ($sType) {
            $sSql .= $this->getCoreTableName() . ".oxlogtype = " . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote(
                $sType
            ) . " AND ";
        }

        $sFromTime = $sFromTime ? $sFromTime : Registry::get(Request::class)->getRequestEscapedParameter('delete_oxfromtime');
        if ($sFromTime) {
            $sSql .= $this->getCoreTableName() . ".oxtime > " . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote(
                $sFromTime
            ) . " AND ";
        }

        $sToTime = $sToTime ? $sToTime : Registry::get(Request::class)->getRequestEscapedParameter('delete_oxtotime');
        if ($sToTime) {
            $sSql .= $this->getCoreTableName() . ".oxtime < " . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote(
                $sToTime
            ) . " AND ";
        }

        $sSql .= $this->getCoreTableName() . ".oxshopid = " . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote(
            Registry::getConfig()->getShopId()
        );

        return $sSql;
    }

    /**
     * @param bool $sModId
     * @param bool $sType
     * @param bool $sFromTime
     * @param bool $sToTime
     * @return int
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function delLog($sModId = false, $sType = false, $sFromTime = false, $sToTime = false)
    {
        $sSql = $this->_getDelSql($sModId, $sType, $sFromTime, $sToTime);

        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->Execute($sSql);
    }

    /**
     * @return array
     */
    public function getSearchableFields()
    {
        $aSkipFields = array('oxid');
        $aFields     = array_diff(array_keys($this->_aFieldNames), $aSkipFields);

        return $aFields;
    }

    /**
     * get logging modcfg object
     *
     * @return d3_cfg_mod
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogSet()
    {
        return d3_cfg_mod::get($this->_sLogSetId);
    }

    /**
     * register an error handler
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function registerErrorHandler()
    {
        if (class_exists(d3_cfg_mod::class) && d3_cfg_mod::isCallable()) {
            try {
                if ($this->getLogSet()->getId() && $this->getLogSet()->getValue('blLog_enableErrorReporting')) {
                    register_shutdown_function(array($this, 'd3logShutDown'));
                    // E_USER_ERROR will catched twice, no additional handling needed
                    set_error_handler(array($this, 'd3logError'), E_ALL ^ E_USER_ERROR);
                }
            } catch (\Exception $e) {
                return;
            }
        }
    }

    /**
     * log fatal error shutdowns
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3logShutDown()
    {
        $aError = error_get_last();
        $this->d3logError($aError['type'], $aError['message'], $aError['file'], $aError['line']);
    }

    /**
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3logError($errno, $errstr, $errfile, $errline)
    {
        $sClass    = null;
        $sFunction = null;
        $sLine     = null;
        $sContent  = null;

        if (self::_d3extractClassName($errfile) == __CLASS__) {
            $aTrace    = debug_backtrace();
            $sClass    = $aTrace[1]['class'] ? $aTrace[1]['class'] : self::_d3extractClassName($aTrace[1]['file']);
            $sFunction = $aTrace[1]['function'];
            $sLine     = $aTrace[1]['line'];

            foreach (array_keys($aTrace) as $key) {
                if ($aTrace[$key]['object']) {
                    unset($aTrace[$key]['object']);
                }
            }

            $sContent = trim(strip_tags($errstr)) . "\n\n";
            $sContent .= print_r($aTrace, true);
        } else {
            $sClass    = self::_d3extractClassName($errfile);
            $sFunction = 'unknown';
            $sLine     = $errline;
            $sContent  = trim($errstr);
        }

        $this->Log(
            self::_d3getErrorStatus($errno),
            $sClass,
            $sFunction,
            $sLine,
            'ErrorReporting',
            $sContent . PHP_EOL . print_r($_REQUEST, true)
        );

        return false;
    }

    /**
     * @param $errno
     *
     * @return int
     */
    private function _d3getErrorStatus($errno)
    {
        $sErrState = null;

        switch ((int)$errno) {
            case E_NOTICE:
            case E_USER_NOTICE:
                $sErrState = d3LogLevel::NOTICE;
                break;
            case E_WARNING:
            case E_USER_WARNING:
                $sErrState = d3LogLevel::WARNING;
                break;
            case E_ERROR:
            case E_RECOVERABLE_ERROR:
            case E_USER_ERROR:
                $sErrState = d3LogLevel::EMERGENCY;
                break;
            case E_STRICT:
                $sErrState = d3LogLevel::WARNING;
                break;
            case null:
                $sErrState = d3LogLevel::NONE;
                break;
            default:
                $sErrState = d3LogLevel::ERROR;
        }

        if (version_compare(PHP_VERSION, '5.3', '>')) {
            switch ((int)$errno) {
                case E_DEPRECATED:
                case E_USER_DEPRECATED:
                    $sErrState = d3LogLevel::WARNING;
                    break;
            }
        }

        return $sErrState;
    }

    /**
     * @param $sFile
     *
     * @return string
     */
    private function _d3extractClassName($sFile)
    {
        $sFile = basename($sFile);
        $iEnd  = strrpos($sFile, '.');

        return substr($sFile, 0, $iEnd);
    }

    /**
     * show profiling
     */
    public function d3GetProfiling()
    {
        $view = Registry::getConfig()->getActiveView();
        /** @var d3_oxshopcontrol_modcfg_extension|ShopControl $oShopControl */
        $oShopControl = oxNew(ShopControl::class);
        $oShopControl->d3StopMonitoring($view);
    }

    /**
     * check, if modcfg can get items
     *
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public static function isCallable()
    {
        if (class_exists(d3database::class) &&
            ($oD3DataBase = d3database::getInstance()) &&
            $oD3DataBase->checkTableExist(self::$_sD3CoreTable)
        ) {
            return true;
        }

        return false;
    }

    /**
     * @param $sLogType
     *
     * @return string
     */
    public function getLogTypeTranslation($sLogType)
    {
        $sTranslationIdent = "D3_LOGTYPE_" . strtoupper($sLogType);

        $sTranslation = Registry::getLang()->translateString($sTranslationIdent);

        if ($sTranslation == $sTranslationIdent) {
            return $sLogType;
        } else {
            return $sTranslation;
        }
    }

    /**
     * @param string $sBaseModId
     * @return array
     * @throws DatabaseConnectionException
     */
    public function d3BuildExportQuery($sBaseModId = '')
    {
        $aWhere = array();

        $sModId = Registry::get(Request::class)->getRequestEscapedParameter('export_oxmodid');
        if ($sModId) {
            $aWhere['oxmodid'] = $sModId;
            Registry::getConfig()->getActiveView()->addTplParam('oxmodid', $sModId);
        }

        $sTime = Registry::get(Request::class)->getRequestEscapedParameter('export_oxtime');
        if ($sTime) {
            $aWhere['oxtime'] = date('Y-m-d H:i:s', strtotime($sTime));
            Registry::getConfig()->getActiveView()->addTplParam('oxtime', $sTime);
        }

        $sSessid = trim(Registry::get(Request::class)->getRequestEscapedParameter('export_oxsessid'));
        if ($sSessid) {
            $aWhere['oxsessid'] = $sSessid;
            Registry::getConfig()->getActiveView()->addTplParam('oxsessid', $sSessid);
        }

        $sClass = trim(Registry::get(Request::class)->getRequestEscapedParameter('export_oxclass'));
        if ($sClass) {
            $aWhere['oxclass'] = $sClass;
            Registry::getConfig()->getActiveView()->addTplParam('oxclass', $sClass);
        }

        $sSelect = $this->buildSelectString($aWhere);

        $aSearch = array('oxtime =');
        $aReplace = array('oxtime >');
        if ($sBaseModId) {
            $aSearch[] = ' where 1 ';
            $aReplace[] = ' where 1 AND oxmodid LIKE '.DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote('%'.$sBaseModId.'%');
        }

        $sSelect = str_replace($aSearch, $aReplace, $sSelect);

        return $sSelect;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _handleMailMessage()
    {
        if (false == $this->_blStandAloneUse) {
            if ($this->_checkMailMessage()) {
                $this->_sendMailMessage();
            }
        }
    }

    /**
     * @param $mText
     * @param $blDie
     */
    protected function _handleDie($mText, $blDie)
    {
        if ($blDie) {
            die($mText);
        }
    }

    /**
     * @param string $sModId
     * @return string
     * @throws DatabaseConnectionException
     * @throws DBALException
     */
    public function getItemCount($sModId = '')
    {
        $oDb = DatabaseProvider::getDb();
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from($this->getCoreTableName())
            ->setMaxResults(1)
        ;

        if ($sModId) {
            $oQB->where('oxmodid LIKE '.$oQB->createNamedParameter('%' . $sModId . '%'));
        }

        return $oDb->getOne($oQB->getSQL(), $oQB->getParameters());
    }

    public function insert()
    {
        $this->_insert();
    }
}
