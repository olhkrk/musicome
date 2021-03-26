<?php
/**
 * Class Stars
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class Stars
 *
 * @package Musicome\Model\ResourceModel
 */
class Stars extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('stars');
    }

    public function getSubtitle($contentId)
    {
        $connection = $this->getConnection();
        $sqlQuery = $connection->prepare(
            "SELECT title FROM {$this->getMainTable()} LEFT JOIN media_star_relation ON ({$this->getMainTable()}.id = media_star_relation.star_id) WHERE media_star_relation.media_id = {$contentId}"
        );
        $sqlQuery->execute();
        return $sqlQuery->fetch()['title'];
    }

    public function getStarByContentId($contentId)
    {
        $connection = $this->getConnection();
        $sqlQuery = $connection->prepare(
            "SELECT * FROM {$this->getMainTable()} LEFT JOIN media_star_relation ON ({$this->getMainTable()}.id = media_star_relation.star_id) WHERE media_star_relation.media_id = {$contentId}"
        );
        $sqlQuery->execute();
        return $sqlQuery->fetchAll();
    }
}
