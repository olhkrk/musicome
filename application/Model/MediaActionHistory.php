<?php
/**
 * Class MediaActionHistory
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class MediaActionHistory
 *
 * @package Musicome\Model
 */
class MediaActionHistory extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const MEDIA_ID = 'media_id';
    const ACTION_TYPE_ID = 'action_type_id';
    const USER_ID = 'user_id';
    const CREATED_AT = 'created_id';

    /**
     * MediaActionAttribute constructor.
     */
    public function __construct()
    {
        $this->idFieldName = self::ID_FIELD_NAME;
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

    /**
     * Get action type id
     *
     * @return array|mixed
     */
    public function getActionTypeId()
    {
        return $this->getData(self::ACTION_TYPE_ID);
    }

    /**
     * Set action type id
     *
     * @param mixed $actionTypeId
     *
     * @return $this
     */
    public function setActionTypeId($actionTypeId)
    {
        $this->setData(self::ACTION_TYPE_ID, $actionTypeId);

        return $this;
    }

    /**
     * Get user id
     *
     * @return array|mixed
     */
    public function getUserId()
    {
        return $this->getData(self::USER_ID);
    }

    /**
     * Set user id
     *
     * @param mixed $userId
     *
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->setData(self::USER_ID, $userId);

        return $this;
    }

    /**
     * Get created at
     *
     * @return array|mixed
     */
    public function getCreateAt()
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
