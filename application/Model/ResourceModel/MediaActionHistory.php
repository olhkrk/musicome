<?php
/**
 * Class MediaActionHistory
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class MediaActionHistory
 *
 * @package Musicome\Model\ResourceModel
 */
class MediaActionHistory extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('media_action_history');
    }
}
