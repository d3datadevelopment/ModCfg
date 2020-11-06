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
 * @author        D3 Data Development <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Parametercontainer;

use D3\ModCfg\Application\Model\Log\d3log;
use Exception;
use OxidEsales\Eshop\Core\Model\BaseModel;

class Registry
{
    protected static $instance;
    protected $objects = array();
    protected $shoudISave = false;

    /**
     *
     * @return $this
     */
    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = oxNew(Registry::class);
        }

        return self::$instance;
    }

    /**
     * @param BaseModel $baseModel
     */
    public function add(BaseModel $baseModel)
    {
        if (is_null($baseModel->getId())) {
            $baseModel->setId();
        }
        $this->objects[$baseModel->getId()] = clone $baseModel;
        if ($baseModel instanceof d3log) {
            $baseModel::remove($baseModel->d3getModId());
        }
    }


    /**
     * save and clear objects
     * @throws Exception
     */
    public function save()
    {
        if ($this->shoudISave) {
            foreach ($this->objects as $object) {
                /** @var $object BaseModel */
                if (false == $object->exists()) {
                    $object->save();
                }
            }
        }

        $this->objects = array();
    }

    public function allowSave()
    {
        $this->shoudISave = true;
    }
}
