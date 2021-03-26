<?php
/**
 * Class Model
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Core;

/**
 * Class Model
 */
class Model
{
    /** @var string $idFieldName */
    protected $idFieldName;

    /** @var array $_data */
    protected $_data = [];

    /**
     * Get data
     *
     * @param string|null $fieldName
     *
     * @return array|mixed
     */
    public function getData(string $fieldName = null)
    {
        if ($fieldName == null) {
            return $this->_data;
        }

        return $this->_data[$fieldName] ?? null;
    }

    /**
     * Set data
     *
     * @param $key
     * @param null $value
     *
     * @return $this
     */
    public function setData($key, $value = null)
    {
        if (is_array($key)) {
            $this->_data = $key;
        } else {
            $this->_data[$key] = $value;
        }

        return $this;
    }

    /**
     * Get Id
     *
     * @return array|mixed|null
     */
    public function getId() {
        return $this->getIdFieldName();
    }

    /**
     * Get Id Field Name
     *
     * @return array|mixed|null
     */
    public function getIdFieldName()
    {
        return $this->getData($this->idFieldName);
    }

    /**
     * Set Id Field Name
     *
     * @param $value
     */
    public function setIdFieldName($value)
    {
        $this->setData($this->idFieldName, $value);
    }
}