<?php
/**
 * Class Stars
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class Stars
 *
 * @package Musicome\Model
 */
class Stars extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const PICTURE = 'picture';

    /**
     * Media constructor.
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
     * Get description
     *
     * @return array|mixed
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDesctiption(string $description)
    {
        $this->setData(self::DESCRIPTION, $description);

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
}
