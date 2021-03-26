<?php
/**
 * Class Playlist
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class Playlist
 *
 * @package Musicome\Model
 */
class Playlist extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const TITLE = 'title';
    const SUBTITLE = 'subtitle';
    const PICTURE = 'picture';
    const URL = 'url';
    const CREATED_AT = 'created_at';

    /**
     * Media constructor.
     */
    public function __construct()
    {
        $this->idFieldName = self::ID_FIELD_NAME;
    }

    /**
     * Get Subtitle
     *
     * @return array|mixed
     */
    public function getSubtitle()
    {
        return $this->getData(self::SUBTITLE);
    }

    /**
     * Set Subtitle
     *
     * @param int $subtitle
     *
     * @return $this
     */
    public function setSubtitle($subtitle)
    {
        $this->setData(self::SUBTITLE, $subtitle);

        return $this;
    }

    /**
     * Get Path
     *
     * @return array|mixed
     */
    public function getPath()
    {
        return $this->getData(self::URL);
    }

    /**
     * Set Url
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->setData(self::URL, $url);

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
}
