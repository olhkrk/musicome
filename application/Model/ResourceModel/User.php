<?php
/**
 * Class User
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class User
 *
 * @package Musicome\Model\ResourceModel
 */
class User extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('user');
    }
}
