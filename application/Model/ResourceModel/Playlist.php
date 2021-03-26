<?php
/**
 * Class Playlist
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class Playlist
 *
 * @package Musicome\Model\ResourceModel
 */
class Playlist extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('playlist');
    }
}
