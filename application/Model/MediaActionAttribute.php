<?php
/**
 * Class MediaActionAttribute
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class MediaActionAttribute
 *
 * @package Musicome\Model
 */
class MediaActionAttribute extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const TITLE = 'title';

    /**
     * MediaActionAttribute constructor.
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
}
