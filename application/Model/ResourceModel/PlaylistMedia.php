<?php
/**
 * Class PlaylistMedia
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class PlaylistMedia
 *
 * @package Musicome\Model\ResourceModel
 */
class PlaylistMedia extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('playlist_media');
    }
}
