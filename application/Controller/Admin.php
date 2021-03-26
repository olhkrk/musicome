<?php
/**
 * Class Admin
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;
use Musicome\Model\ResourceModel\Media as MediaResourceModel;
use Musicome\Model\Media as MediaModel;
use Musicome\Model\MediaAttributeVarchar as MediaAttributeVarchar;
use Musicome\Model\ResourceModel\MediaAttributeVarchar as MediaAttributeVarcharResource;
use Musicome\Model\MediaAttribute as MediaAttribute;
use Musicome\Model\ResourceModel\MediaAttribute as MediaAttributeResource;
use Musicome\Model\MediaSimilarity;
use Musicome\Model\ResourceModel\MediaSimilarity as MediaSimilarityResource;

/**
 * Class Admin
 */
class Admin extends AbstractController
{

    /** @var \Musicome\Core\Logger $logger */
    protected $logger;

    /**
     * Admin constructor.
     */
    public function __construct()
    {
        $this->logger = new \Musicome\Core\Logger();
    }

    /**
     * Index action
     */
    public function actionIndex()
    {
        $this->view->generate('about/index_view.php', 'template_view.php');
    }

    /**
     * Calculate All Similarity action
     */
    public function actionCalculateallsimilarity()
    {
        $this->claculateSimilarity();
    }

    protected function claculateSimilarity($currentMedia = null)
    {
        try {
            if ($currentMedia == null) {
                $mediaRepository = new MediaResourceModel();
                $mediaModels = new MediaModel();
                $similarityResource = new MediaSimilarityResource();
                $mediaModels = $mediaRepository->load($mediaModels);
                $similarityResource->truncate();

                $i=0;
                /** @var MediaModel $mediaItem */
                foreach ($mediaModels as $mediaItem) {
                    $i++;
                    $currentCortege = $this->getCortegesByMediaAsArray($mediaItem);
                    $currentMediaMaxWeight = max($currentCortege);
                    $currentMediaAttributeCount = count($currentCortege);
                    $mediaModelList = new MediaModel();
                    $mediaModelList = $mediaRepository->load($mediaModelList);

                    /** @var MediaModel $itemModel */
                    foreach ($mediaModelList as $itemModel) {
                        echo '<p>';
                        if ($mediaItem->getId() == $itemModel->getId()) {
                            continue;
                        }

                        $mediaCortege = $this->getCortegesByMediaAsArray($itemModel);
                        $mediaMaxWeight = max($mediaCortege);
                        $sameInCorteges = array_intersect_key($mediaCortege, $currentCortege);
                        $result = 0;

                        foreach ($sameInCorteges as $cortege) {
                            $result += (($cortege / $mediaMaxWeight) * 0.75);
                        }

                        $similarity = $result / $currentMediaAttributeCount * (array_sum($sameInCorteges) / $currentMediaMaxWeight);
                        $similarityModel = new MediaSimilarity();
                        $similarityResource = new MediaSimilarityResource();
                        $similarityModel->setMedia1($mediaItem->getId());
                        $similarityModel->setMedia2($itemModel->getId());
                        $similarityModel->setSimilarity($similarity);
                        $similarityResource->save($similarityModel);
                        $similarityModel = new MediaSimilarity();
                        $similarityResource = new MediaSimilarityResource();
                        $similarityModel->setMedia1($itemModel->getId());
                        $similarityModel->setMedia2($mediaItem->getId());
                        $similarityModel->setSimilarity($similarity);
                        $similarityResource->save($similarityModel);
                    }
                }
                return true;
            }
        } catch (Exception $exception) {
            $this->logger->critical($exception->getMessage());
        }
    }

    protected function getCortegesByMediaAsArray(MediaModel $media) {
        $cortegeList = $this->getAttributesAsCorteges($media);
        $mediaAttributes = [];
        foreach ($cortegeList as $cortege) {
            $mediaAttributes[$cortege['subject']] = $cortege['weight'];
        }
        return $mediaAttributes;
    }

    protected function getAttributesAsCorteges(MediaModel $media) {
        $attributeVarcharModel = new MediaAttributeVarchar();
        $attributeVarcharResourceModel = new MediaAttributeVarcharResource();
        $mediaAttributes = $attributeVarcharResourceModel->load(
            $attributeVarcharModel,
            $media->getId(),
            MediaAttributeVarchar::MEDIA_ID
        );

        $corteges = [];

        /** @var MediaAttributeVarchar $mediaAttribute */
        foreach($mediaAttributes as $mediaAttribute) {
            $attribute = new MediaAttribute();
            $attributeResource = new MediaAttributeResource();

            /** @var MediaAttribute $attribute */
            $attribute = $attributeResource->load($attribute, $mediaAttribute->getAttributeId());
            $corteges[] = [
                'subject' => $mediaAttribute->getAttributeId() . '_' . $mediaAttribute->getValue(),
                'weight' => $attribute->getWeight() ?? 0
            ];
        }

        return $corteges;
    }
}
