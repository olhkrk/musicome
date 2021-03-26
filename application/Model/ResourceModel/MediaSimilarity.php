<?php
/**
 * Class MediaSimilarity
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class MediaSimilarity
 *
 * @package Musicome\Model\ResourceModel
 */
class MediaSimilarity extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('media_similarity');
    }

    public function getSimilarContent($object, $contentId, $similarity = 0.05) {
        $connection = $this->getConnection();
        $sqlQuery = $connection->prepare(
            "SELECT media_2 FROM {$this->getMainTable()} WHERE media_1 = {$contentId} AND similarity > {$similarity}"
        );
        $sqlQuery->execute(['tablename' => $this->getMainTable()]);
        $result = $sqlQuery->fetchAll();
        $resultArray = [];

        foreach ($result as $item) {
            $resultArray[] = $item['media_2'];
        }

        return $resultArray;
    }
}
