<?php
/**
 * Class MediaAttributeVarchar
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class MediaAttributeVarchar
 *
 * @package Musicome\Model
 */
class MediaAttributeVarchar extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const ATTRIBUTE_ID = 'attribute_id';
    const VALUE = 'value';
    const MEDIA_ID = 'media_id';

    /**
     * Media constructor.
     */
    public function __construct()
    {
        $this->idFieldName = self::ID_FIELD_NAME;
    }

    /**
     * Get attribute id
     *
     * @return array|mixed
     */
    public function getAttributeId()
    {
        return $this->getData(self::ATTRIBUTE_ID);
    }

    /**
     * Set attribute id
     *
     * @param mixed $attributeId
     *
     * @return $this
     */
    public function setAttributeId($attributeId)
    {
        $this->setData(self::ATTRIBUTE_ID, $attributeId);

        return $this;
    }

    /**
     * Get value
     *
     * @return array|mixed
     */
    public function getValue()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * Set value
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->setData(self::VALUE, $value);

        return $this;
    }

    /**
     * Get media id
     *
     * @return array|mixed
     */
    public function getMediaId()
    {
        return $this->getData(self::MEDIA_ID);
    }

    /**
     * Set media id
     *
     * @param mixed $mediaId
     *
     * @return $this
     */
    public function setMediaId($mediaId)
    {
        $this->setData(self::MEDIA_ID, $mediaId);

        return $this;
    }
}
