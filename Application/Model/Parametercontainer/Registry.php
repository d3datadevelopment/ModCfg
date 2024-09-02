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

namespace D3\ModCfg\Application\Model\Parametercontainer;

use D3\ModCfg\Application\Model\Log\d3log;
use Exception;
use OxidEsales\Eshop\Core\Model\BaseModel;

class Registry
{
    protected static $instance;
    protected $objects = [];
    protected $shoudISave = false;

    /**
     *
     * @return $this
     */
    public static function getInstance()
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

        $this->objects = [];
    }

    public function allowSave()
    {
        $this->shoudISave = true;
    }
}
