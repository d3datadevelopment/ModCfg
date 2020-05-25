<?php

namespace D3\ModCfg\Application\Model\Transactionlog;

use BadMethodCallException;
use D3\ModCfg\Application\Model\Parametercontainer\Registry;
use D3\ModCfg\Application\Model\Transactionlog\Reader\AbstractReader;
use Exception;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use RuntimeException;

final class d3transactionlog extends BaseModel
{
    const TYPE_REQUEST = 'request';

    const TYPE_RESPONSE = 'response';

    /** @var string */
    protected $_sCoreTable = 'd3transactionlog';

    /** @var string */
    protected $_sClassName = self::class;

    /** @var  AbstractReader */
    protected $reader;

    /** @var array */
    protected $fieldDataProividers = array(
        'd3reference'         => '',
        'd3transactiontime'   => '',
        'd3transactionstatus' => '',
    );

    /**
     * @param AbstractReader $reader
     * @param null                                           $group
     */
    public function __construct(AbstractReader $reader, $group = null)
    {
        parent::__construct();

        $this->init();
        $this->setTransactionLogReader($reader);
        $this->setGroup($group);
    }

    /**
     * @param AbstractReader $reader
     *
     * @return $this
     */
    public function setTransactionLogReader(AbstractReader $reader)
    {
        $this->reader = $reader;

        return $this;
    }

    /**
     * @return AbstractReader
     */
    public function getTransactionLogReader()
    {
        return $this->reader;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setGroup($value)
    {
        $this->assign(array('d3group' => $value));

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setModid($value)
    {
        $this->assign(array('d3modid' => $value));

        return $this;
    }

    /**
     * @return mixed
     */
    public function getModid()
    {
        return $this->getFieldData('d3modid');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setSessionId($value)
    {
        $this->assign(array('oxsessid' => $value));

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->getFieldData('oxsessid');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setProfileid($value)
    {
        $this->assign(array('d3profileid' => $value));

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfileid()
    {
        return $this->getFieldData('d3profileid');
    }

    /**
     * @return mixed
     * @throws RuntimeException
     */
    public function getGroup()
    {
        if ($this->getFieldData('d3group') == '') {
            throw new RuntimeException('Reference number (group) was not initialized!');
        }

        return $this->getFieldData('d3group');
    }

    /**
     * @return $this
     */
    public function markAsRequest()
    {
        $this->assign(array('d3action' => self::TYPE_REQUEST));

        return $this;
    }

    /**
     * @return $this
     */
    public function markAsResponse()
    {
        $this->assign(array('d3action' => self::TYPE_RESPONSE));

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->getFieldData('d3action');
    }

    /**
     * @param $data
     *
     * @return $this
     */
    public function setTransactiondata($data)
    {
        $this->assign(array('d3transactiondata' => base64_encode(serialize($data))));
        $this->reader->read($data);

        return $this;
    }

    /**
     * @return AbstractReader
     */
    public function getTransactiondata()
    {
        $this->reader->read(unserialize(base64_decode($this->getFieldData('d3transactiondata'))));

        return $this->reader;
    }

    /**
     * Sets transaction time if not already defined
     * @return mixed
     * @throws Exception
     */
    public function save()
    {
        if ($this->exists()) {
            throw new BadMethodCallException("This instance was alredy saved! You must create a new instance!");
        }

        $this->invokeFieldDataProviders();

        $return = parent::save();

        Registry::getInstance()->add($this);

        return $return;
    }

    /**
     * executes all defined field data providers
     *
     * @return $this
     */
    private function invokeFieldDataProviders()
    {
        $providers = $this->getFieldDataProviders();
        array_walk($providers, array($this, 'executeDataProvider'));

        return $this;
    }

    /**
     * Defines a data provider for the given field
     *
     * @param          $field
     * @param callable $callback
     *
     * @throws BadMethodCallException
     * @return d3transactionlog
     */
    public function setFieldDataProvider($field, $callback)
    {
        if (false == is_callable($callback)) {
            throw new BadMethodCallException("You did not provide a valid callback!");
        }

        $this->fieldDataProividers[$field] = $callback;

        return $this;
    }

    /**
     * Returns all field data providers
     *
     * @return array
     */
    private function getFieldDataProviders()
    {
        return $this->fieldDataProividers;
    }

    /**
     * @param BaseModel $object
     *
     * @return mixed
     * @throws Exception
     */
    public function referTo(BaseModel $object)
    {
        $referer = oxNew(object2d3transactionlog::class);
        $referer->assign(
            array(
                 'oxobjectid' => $object->getId(),
                 'd3group'    => $this->getGroup(),
                 'oxtype'     => $object->getClassName(),
            )
        );

        return $referer->save();
    }

    /**
     * Returns a list of transactions associated to the given object
     *
     * @param BaseModel $object
     * @param array $aFilter
     *
     * @return d3transactionloglist
     */
    public function getTransactionsFor(BaseModel $object, $aFilter = array())
    {
        $list  = oxNew(d3transactionloglist::class, $this);
        $type  = self::TYPE_RESPONSE;
        $query = <<<QUERY
SELECT {$this->getCoreTableName()}.* FROM {$this->getCoreTableName()}
LEFT JOIN d3_d3log_oxobject2d3transactionlog ON {$this->getCoreTableName()}.d3group = d3_d3log_oxobject2d3transactionlog.d3group
WHERE
    d3_d3log_oxobject2d3transactionlog.oxobjectid = '{$object->getId()}'
    AND {$this->getCoreTableName()}.d3action = '{$type}' AND {$this->_getFilterQuery($aFilter)}
ORDER BY {$this->getCoreTableName()}.d3lognr
QUERY;
        $list->selectString($query);

        return $list;
    }

    /**
     * @param array $aFilter
     * @return string
     */
    protected function _getFilterQuery($aFilter)
    {
        return count($aFilter) ? implode(' AND ', array_map(array($this, '_getFilterFieldQuery'), array_keys($aFilter), $aFilter)) : ' 1 ';
    }

    /**
     * @param $sField
     * @param $sValue
     * @return string
     * @throws DatabaseConnectionException
     */
    protected function _getFilterFieldQuery($sField, $sValue)
    {
        if (strtolower(trim($sField)) == 'd3transactiondata') {
            return 'CONVERT(FROM_BASE64('.$this->getCoreTableName() . '.' . $sField . ') USING latin1) LIKE ' .
                DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote($sValue);
        }

        return $this->getCoreTableName().'.'.$sField . ' LIKE ' . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote($sValue);
    }

    /**
     * @param $sGroupNumber
     *
     * @return d3transactionloglist
     */
    public function getTransactionsByGroup($sGroupNumber)
    {
        $list  = oxNew(d3transactionloglist::class, $this);

        $query = <<<QUERY
SELECT {$this->getCoreTableName()}.* FROM {$this->getCoreTableName()}
WHERE
   {$this->getCoreTableName()}.d3group = '{$sGroupNumber}'
ORDER BY {$this->getCoreTableName()}.d3lognr
QUERY;
        $list->selectString($query);

        return $list;
    }

    /**
     * Invokes callbacks and sets the provided data as field values
     *
     * @param $callback
     * @param $key
     * @throws /BadMethodCallException
     */
    private function executeDataProvider($callback, $key)
    {
        if (!is_callable($callback)) {
            throw new BadMethodCallException(
                "You did not provide a data provider for field '$key'! Use \$transactionLog->setFieldDataProvider('$key', callable);"
            );
        }

        $data = array($key => call_user_func($callback));
        $this->assign($data);
    }
}
