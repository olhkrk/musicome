<?php
/**
 * Class Media
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model\ResourceModel;

use Musicome\Core\AbstractResourceModel;

/**
 * Class Media
 *
 * @package Musicome\Model\ResourceModel
 */
class Media extends AbstractResourceModel
{
    public function __construct()
    {
        parent::__construct();
        $this->_init('media');
    }

    /**
     * @param $object
     * @param $ids
     */
    public function getById($object, $ids)
    {
        if (is_array($ids)) {
            $resultArray = [];

            foreach ($ids as $id) {
                $subObject = clone $object;
                $resultArray[] = $this->load($subObject, $id);
            }

            return $resultArray;
        }

        return [$this->load($object, $ids)];
    }

    /**
     * @param $object
     * @param $ids
     */
    public function getAllById($object, $ids)
    {
        if (is_array($ids)) {
            $mediaIds = implode(',', $ids);

            $connection = $this->getConnection();
            $sqlQuery = $connection->prepare(
                "SELECT media.id as id, media.path as path, media.title as title, media.picture as picture, media_album.title as album_title" .
                " FROM media LEFT JOIN media_album ON (media.album_id = media_album.id)" .
                " WHERE media.id IN ({$mediaIds})"
            );
            $sqlQuery->execute();

            $resultArray = $sqlQuery->fetchAll();
            $mediaAttributes = new \Musicome\Model\MediaAttribute();
            $mediaAttributesRepo = new MediaAttribute();
            $mediaAttributes = $mediaAttributesRepo->load($mediaAttributes);

            $mediaAttributeList = [];
            /** @var \Musicome\Model\MediaAttribute $mediaAttribute */
            foreach ($mediaAttributes as $mediaAttribute) {
                $mediaAttributeList[$mediaAttribute->getId()] = $mediaAttribute->getTitle();
            }

            foreach ($resultArray as &$content) {
                $mediaAttribute = new \Musicome\Model\MediaAttributeVarchar();
                $mediaAttributeVarcharRepo = new MediaAttributeVarchar();
                $attributes = $mediaAttributeVarcharRepo->load($mediaAttribute, $content['id'], 'media_id');
                /** @var \Musicome\Model\MediaAttributeVarchar $attribute */
                foreach ($attributes as $attribute) {
                    $content['attr_' . strtolower($mediaAttributeList[$attribute->getAttributeId()])] = $attribute->getValue();
                }

                $starRepo = new Stars();
                $stars = $starRepo->getStarByContentId($content['id']);
                $i = 0;
                $starList = "";

                /** @var \Musicome\Model\Stars $star */
                foreach ($stars as $star) {
                    if ($i !== 0) {
                        $starList .= ', ';
                    }

                    $starList .= "<a href='/page?page_id=" . $star['id'] . "'>" . $star['title'] . "</a>";
                    $i++;
                }

                $content['singers'] = $starList;
            }

            return $resultArray;
        }

        return [$this->load($object, $ids)];
    }
}
