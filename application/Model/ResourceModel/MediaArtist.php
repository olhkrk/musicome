<?php
/**
 * Class MediaArtist
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class MediaArtist
 *
 * @package Musicome\Model\ResourceModel
 */
class MediaArtist extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('media_star_relation');
    }
}
