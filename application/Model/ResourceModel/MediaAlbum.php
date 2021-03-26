<?php
/**
 * Class MediaAlbum
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class MediaAlbum
 *
 * @package Musicome\Model\ResourceModel
 */
class MediaAlbum extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('media_album');
    }
}
