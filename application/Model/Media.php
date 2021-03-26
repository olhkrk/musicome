<?php
/**
 * Class Media
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class Media
 *
 * @package Musicome\Model
 */
class Media extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const TYPE_ID = 'type_id';
    const PATH = 'path';
    const DURATION = 'duraction';
    const TITLE = 'title';
    const PICTURE = 'picture';
    const CREATED_AT = 'created_at';
    const ALBUM_ID = 'album_id';

    /**
     * Media constructor.
     */
    public function __construct()
    {
        $this->idFieldName = self::ID_FIELD_NAME;
    }

    /**
     * Get Type Id
     *
     * @return array|mixed
     */
    public function getTypeId()
    {
        return $this->getData(self::TYPE_ID);
    }

    /**
     * Set Type Id
     *
     * @param int $typeId
     *
     * @return $this
     */
    public function setTypeId(int $typeId)
    {
        $this->setData(self::TYPE_ID, $typeId);

        return $this;
    }

    /**
     * Get Path
     *
     * @return array|mixed
     */
    public function getPath()
    {
        return $this->getData(self::PATH);
    }

    /**
     * Set Path
     *
     * @param string $path
     *
     * @return $this
     */
    public function setPath(string $path)
    {
        $this->setData(self::PATH, $path);

        return $this;
    }

    /**
     * Get duration
     *
     * @return array|mixed
     */
    public function getDuration()
    {
        return $this->getData(self::DURATION);
    }

    /**
     * Set Path
     *
     * @param mixed $duration
     *
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->setData(self::DURATION, $duration);

        return $this;
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
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->setData(self::TITLE, $title);

        return $this;
    }

    /**
     * Get title
     *
     * @return array|mixed
     */
    public function getPicture()
    {
        return $this->getData(self::PICTURE);
    }

    /**
     * Set title
     *
     * @param string $picture
     *
     * @return $this
     */
    public function setPicture(string $picture)
    {
        $this->setData(self::PICTURE, $picture);

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

    /**
     * Get albumid
     *
     * @return array|mixed
     */
    public function getAlbumId()
    {
        return $this->getData(self::ALBUM_ID);
    }

    /**
     * Set album id
     *
     * @param mixed $albumId
     *
     * @return $this
     */
    public function setAlbumId($albumId)
    {
        $this->setData(self::ALBUM_ID, $albumId);

        return $this;
    }
}
