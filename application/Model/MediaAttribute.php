<?php
/**
 * Class MediaAttribute
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class MediaAttribute
 *
 * @package Musicome\Model
 */
class MediaAttribute extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const TITLE = 'title';
    const WEIGHT = 'weight';
    const CREATED_AT = 'created_at';

    /**
     * MediaAttribute constructor.
     */
    public function __construct()
    {
        $this->idFieldName = self::ID_FIELD_NAME;
    }

    /**
     * Get title
     *
     * @return array|mixed
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set title
     *
     * @param mixed $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->setData(self::TITLE, $title);

        return $this;
    }

    /**
     * Get weight
     *
     * @return array|mixed
     */
    public function getWeight()
    {
        return $this->getData(self::WEIGHT);
    }

    /**
     * Set weight
     *
     * @param mixed $weight
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->setData(self::WEIGHT, $weight);

        return $this;
    }

    /**
     * Get created at
     *
     * @return array|mixed
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created at
     *
     * @param mixed $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);

        return $this;
    }
}
