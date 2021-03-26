<?php
/**
 * Class MediaActionType
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class MediaActionType
 *
 * @package Musicome\Model\ResourceModel
 */
class MediaActionType extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('media_action_type');
    }
}
