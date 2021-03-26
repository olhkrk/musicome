<?php
/**
 * Class MediaAttribute
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class MediaAttribute
 *
 * @package Musicome\Model\ResourceModel
 */
class MediaAttribute extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('media_attribute');
    }
}
