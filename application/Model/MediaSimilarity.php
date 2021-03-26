<?php
/**
 * Class MediaSimilarity
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class MediaSimilarity
 *
 * @package Musicome\Model
 */
class MediaSimilarity extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const MEDIA_1 = 'media_1';
    const MEDIA_2 = 'media_2';
    const SIMILARITY = 'similarity';

    /**
     * MediaAttribute constructor.
     */
    public function __construct()
    {
        $this->idFieldName = self::ID_FIELD_NAME;
    }

    /**
     * Get media 1
     *
     * @return array|mixed
     */
    public function getMedia1()
    {
        return $this->getData(self::MEDIA_1);
    }

    /**
     * Set media 1
     *
     * @param mixed $mediaOne
     *
     * @return $this
     */
    public function setMedia1($mediaOne)
    {
        $this->setData(self::MEDIA_1, $mediaOne);

        return $this;
    }

    /**
     * Get media 2
     *
     * @return array|mixed
     */
    public function getMedia2()
    {
        return $this->getData(self::MEDIA_2);
    }

    /**
     * Set media 2
     *
     * @param mixed $mediaTwo
     *
     * @return $this
     */
    public function setMedia2($mediaTwo)
    {
        $this->setData(self::MEDIA_2, $mediaTwo);

        return $this;
    }

    /**
     * Get similarity
     *
     * @return array|mixed
     */
    public function getSimilarity()
    {
        return $this->getData(self::SIMILARITY);
    }

    /**
     * Set similarity
     *
     * @param mixed $similarity
     *
     * @return $this
     */
    public function setSimilarity($similarity)
    {
        $this->setData(self::SIMILARITY, $similarity);

        return $this;
    }
}
