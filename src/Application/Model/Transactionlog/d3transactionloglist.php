<?php

namespace D3\ModCfg\Application\Model\Transactionlog;

use D3\ModCfg\Application\Model\Transactionlog\Reader\AbstractReader;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Model\ListModel;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;

/**
 * Class d3transactionloglist
 */
class d3transactionloglist extends ListModel
{
    /** @var AbstractReader */
    private $logreader;

    /**
     * Class Constructor
     *
     * @param string $transactionlog
     *
     * @internal param string $sObjectName Associated list item object type
     */
    public function __construct($transactionlog)
    {
        if (!($transactionlog instanceof d3transactionlog)) {
            throw new \InvalidArgumentException('You have not provided a d3transactionlog instance');
        }

        parent::__construct();

        $this->init($transactionlog->getClassName());
        $this->logreader = $transactionlog->getTransactionLogReader();
    }

    /**
     * Selects and SQL, creates objects and assign them
     *
     * @param string $sql
     * @param array $parameters
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function selectString($sql, array $parameters = array())
    {
        $this->clear();

        $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);
        if ($this->_aSqlLimit[0] || $this->_aSqlLimit[1]) {
            $rs = $oDb->selectLimit($sql, $this->_aSqlLimit[1], $this->_aSqlLimit[0], $parameters);
        } else {
            $rs = $oDb->select($sql, $parameters);
        }

        if ($rs != false && $rs->count() > 0) {
            while (!$rs->EOF) {
                $oListObject = oxNew($this->_sObjectsInListName, $this->logreader);

                $this->_assignElement($oListObject, $rs->fields);

                $this->add($oListObject);

                $rs->fetchRow();
            }
        }
    }
}
