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

namespace D3\ModCfg\Application\Model\Transactionlog;

use BadMethodCallException;
use D3\ModCfg\Application\Model\Parametercontainer\Registry;
use D3\ModCfg\Application\Model\Transactionlog\Reader\AbstractReader;
use Doctrine\DBAL\Connection;
use Exception;
use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\ConnectionProviderInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use RuntimeException;

/**
 * @deprecated
 */
final class d3transactionlog extends BaseModel
{
    public const TYPE_REQUEST = 'request';

    public const TYPE_RESPONSE = 'response';

    /** @var string */
    protected $_sCoreTable = 'd3transactionlog';

    /** @var string */
    protected $_sClassName = self::class;

    /** @var  AbstractReader */
    protected $reader;

    /** @var array */
    protected $fieldDataProividers = [
        'd3reference'         => '',
        'd3transactiontime'   => '',
        'd3transactionstatus' => '',
    ];

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
        $this->assign(['d3group' => $value]);

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setModid($value)
    {
        $this->assign(['d3modid' => $value]);

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
        $this->assign(['oxsessid' => $value]);

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
        $this->assign(['d3profileid' => $value]);

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
        $this->assign(['d3action' => self::TYPE_REQUEST]);

        return $this;
    }

    /**
     * @return $this
     */
    public function markAsResponse()
    {
        $this->assign(['d3action' => self::TYPE_RESPONSE]);

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
        $this->assign(['d3transactiondata' => base64_encode(serialize($data))]);
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
        array_walk($providers, [$this, 'executeDataProvider']);

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
            [
                 'oxobjectid' => $object->getId(),
                 'd3group'    => $this->getGroup(),
                 'oxtype'     => $object->getClassName(),
            ]
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
    public function getTransactionsFor(BaseModel $object, $aFilter = [])
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
        return count($aFilter) ? implode(' AND ', array_map([$this, '_getFilterFieldQuery'], array_keys($aFilter), $aFilter)) : ' 1 ';
    }

    /**
     * @param $sField
     * @param $sValue
     * @return string
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function _getFilterFieldQuery($sField, $sValue)
    {
        /** @var Connection $db */
        $db = ContainerFactory::getInstance()->getContainer()->get(ConnectionProviderInterface::class)->get();

        if (strtolower(trim($sField)) == 'd3transactiondata') {
            return 'CONVERT(FROM_BASE64('.$this->getCoreTableName() . '.' . $sField . ') USING latin1) LIKE ' .
                $db->quote($sValue);
        }

        return $this->getCoreTableName().'.'.$sField . ' LIKE ' . $db->quote($sValue);
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
     * @throws BadMethodCallException
     */
    private function executeDataProvider($callback, $key)
    {
        if (!is_callable($callback)) {
            throw new BadMethodCallException(
                "You did not provide a data provider for field '$key'! Use \$transactionLog->setFieldDataProvider('$key', callable);"
            );
        }

        $data = [$key => call_user_func($callback)];
        $this->assign($data);
    }
}
