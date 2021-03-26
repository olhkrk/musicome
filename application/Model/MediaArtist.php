<?php
/**
 * Class MediaArtist
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class MediaArtist
 *
 * @package Musicome\Model
 */
class MediaArtist extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const STAR_ID = 'star_id';
    const MEDIA_ID = 'media_id';

    /**
     * Media constructor.
     */
    public function __construct()
    {
        $this->idFieldName = self::ID_FIELD_NAME;
    }

    /**
     * Get star id
     *
     * @return array|mixed
     */
    public function getStarId()
    {
        return $this->getData(self::STAR_ID);
    }

    /**
     * Set album id
     *
     * @param mixed $starId
     *
     * @return $this
     */
    public function setStarId($starId)
    {
        $this->setData(self::STAR_ID, $starId);

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
