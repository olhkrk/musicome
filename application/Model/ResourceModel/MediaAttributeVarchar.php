<?php
/**
 * Class MediaAttributeVarchar
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
class MediaAttributeVarchar extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('media_attribute_varchar');
    }

    public function getFrequencyByAttribute($contentIds, $attributeId = null)
    {
        if ($attributeId) {
            $connection = $this->getConnection();
            $ids = implode(',', $contentIds);
            $sqlQuery = $connection->prepare(
                "SELECT COUNT(attribute_id) AS attribute_count FROM {$this->getMainTable()} LEFT JOIN media_attribute ON ({$this->getMainTable()}.attribute_id = media_attribute.id) WHERE media_id IN ({$ids}) AND attribute_id = {$attributeId} GROUP BY attribute_id"
            );
            $sqlQuery->execute();

            return $sqlQuery->fetch();
        }

        $connection = $this->getConnection();
        $ids = implode(',', $contentIds);
        $sqlQuery = $connection->prepare(
            "SELECT attribute_id, weight, COUNT(attribute_id) AS attribute_count FROM {$this->getMainTable()} LEFT JOIN media_attribute ON ({$this->getMainTable()}.attribute_id = media_attribute.id) WHERE media_id IN ({$ids}) GROUP BY attribute_id"
        );
        $sqlQuery->execute();
        $result = $sqlQuery->fetchAll();
        $resultArray = [];

        foreach ($result as $item) {
            $resultArray[$item['attribute_id']] = [
                'weight' => $item['weight'],
                'attribute_count' => $item ['attribute_count']
            ];
        }

        return $resultArray;
    }

    public function getFrequencyByAttributeValue($contentIds)
    {
        $connection = $this->getConnection();
        $ids = implode(',', $contentIds);
        $sqlQuery = $connection->prepare(
            "SELECT attribute_id, value, COUNT(value) AS value_count FROM {$this->getMainTable()} WHERE media_id IN ({$ids}) GROUP BY attribute_id, value"
        );
        $sqlQuery->execute();

        return $sqlQuery->fetchAll();
    }

    public function getAttributesByContentId($contentId) {
        $connection = $this->getConnection();
        $sqlQuery = $connection->prepare("SELECT attribute_id, value FROM {$this->getMainTable()} WHERE media_id = {$contentId}");
        $sqlQuery->execute();

        return $sqlQuery->fetchAll();
    }
}
