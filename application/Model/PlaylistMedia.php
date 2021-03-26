<?php
/**
 * Class PlaylistMedia
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class PlaylistMedia
 *
 * @package Musicome\Model
 */
class PlaylistMedia extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const PLAYLIST_ID = 'playlist_id';
    const MEDIA_ID = 'media_id';
    const CREATED_AT = 'create_at';

    /**
     * Media constructor.
     */
    public function __construct()
    {
        $this->idFieldName = self::ID_FIELD_NAME;
    }

    /**
     * Get playlist id
     *
     * @return array|mixed
     */
    public function getPlaylistId()
    {
        return $this->getData(self::PLAYLIST_ID);
    }

    /**
     * Set playlist id
     *
     * @param string $playlistId
     *
     * @return $this
     */
    public function setPlaylistId($playlistId)
    {
        $this->setData(self::PLAYLIST_ID, $playlistId);

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
     * @param string $mediaId
     *
     * @return $this
     */
    public function setMediaId(string $mediaId)
    {
        $this->setData(self::MEDIA_ID, $mediaId);

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
     * @param string $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(string $createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);

        return $this;
    }
}
