<?php
/**
 * Class Main
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;
use Musicome\Model\User;
use Musicome\Model\ResourceModel\User as UserResource;
use Musicome\Model\MediaActionHistory;
use Musicome\Model\ResourceModel\MediaActionHistory as MediaActionHistoryRepository;
use Musicome\Model\MediaSimilarity;
use Musicome\Model\ResourceModel\MediaSimilarity as MediaSimilarityResource;
use Musicome\Model\Media;
use Musicome\Model\ResourceModel\Media as MediaRepository;
use Musicome\Model\ResourceModel\Stars as StarResource;
use Musicome\Model\ResourceModel\MediaAttributeVarchar as MediaAttributeVarcharRepository;
use Musicome\Model\Playlist;
use Musicome\Model\ResourceModel\Playlist as PlaylistResource;

/**
 * Class Main
 */
class Main extends AbstractController
{
    const POSITIVE = [1,2,3];
    const NEGATIVE = [4,5,6];
    const NETWORK_PARAMS = [
        [
            'weight' => 2
        ],
        [
            'weight' => 3.5
        ],
        [
            'weight' => 1.5
        ],
        [
            'weight' => 2.5
        ],
        [
            'weight' => 0.5
        ]
    ];

    /**
     * Index action
     */
    public function actionIndex()
    {
        $user = new User();
        $userResource = new UserResource();
        $user = $userResource->load($user, 1);
        $result = $this->getRecomendation($user);
        $playlistResult = [];

        foreach ($result as $item) {
            $playlist = new Playlist();
            $playlistRepository = new PlaylistResource();
            $playlistResult[] = $playlistRepository->load($playlist, $item);
        }

        $this->view->generate('main/index_view.php', 'template_view.php', $playlistResult);
    }

    public function getRecomendation(User $customer) {
        $customerId = $customer->getId();
        $mediaActionHistory = new MediaActionHistory();
        $mediaActionHistoryRepository = new MediaActionHistoryRepository();
        $customerHistory = $mediaActionHistoryRepository->load($mediaActionHistory, $customerId, 'user_id');
        $similarityContent = [];
        $currentHistoryIds = [];
        $positive = [];
        $negative = [];

        /** @var MediaActionHistory $content */
        foreach ($customerHistory as $content) {
            $similarity = new MediaSimilarity();
            $similarityResource = new MediaSimilarityResource();
            $similarityContent = array_merge(
                $similarityContent,
                $similarityResource->getSimilarContent($similarity, $content->getId(), 0.2)
            );

            if (in_array($content->getActionTypeId(), self::POSITIVE)) {
                $positive[] = $content->getMediaId();
            }

            if (in_array($content->getActionTypeId(), self::NEGATIVE)) {
                $negative[] = $content->getMediaId();
            }

            $currentHistoryIds[] = $content->getMediaId();
        }

        $similarityContent = array_unique($similarityContent);

        $currentHistoryIds = array_unique($currentHistoryIds);
        $positive = array_unique($positive);
        $negative = array_unique($negative);
        $mediaRepository = new MediaRepository();
        $media = new Media();
        $contents = $mediaRepository->getById($media, $similarityContent);
        $mediaAttributeVarcharRepository = new MediaAttributeVarcharRepository();
        $contentAttributeFrequency = $mediaAttributeVarcharRepository->getFrequencyByAttribute($currentHistoryIds);
        $contentAttributeValueFrequency = $mediaAttributeVarcharRepository->getFrequencyByAttributeValue(
            $currentHistoryIds
        );
        $networkInputValues = [];

        foreach ($contentAttributeValueFrequency as &$contentAttribute) {
            $networkValue = $contentAttribute['value_count'] /
                $contentAttributeFrequency[$contentAttribute['attribute_id']]['attribute_count'];
            $positiveAction = $mediaAttributeVarcharRepository->getFrequencyByAttribute($positive, $contentAttribute['attribute_id'])['attribute_count'];
            $negativeAction = $mediaAttributeVarcharRepository->getFrequencyByAttribute($negative, $contentAttribute['attribute_id'])['attribute_count'];
            $networkWeight = (($positiveAction - $negativeAction) / 2 *
                $contentAttributeFrequency[$contentAttribute['attribute_id']]['weight']) + 0.5;
            $networkInputValues[$contentAttribute['attribute_id']][$contentAttribute['value']] =
                $networkValue * $networkWeight;
        }

        $resultMedia = [];
        $networkParams = self::NETWORK_PARAMS;

        /** @var Media $content */
        foreach ($contents as $content) {
            $resultValue = 0;
            $attributes = $mediaAttributeVarcharRepository->getAttributesByContentId($content->getId());
            foreach ($networkParams as $param) {
                foreach ($attributes as $attribute) {
                    $resultValue += ((($networkInputValues[$attribute['attribute_id']][$attribute['value']] ?? 0) *
                            $param['weight']) / count($networkParams));
                }
            }

            if ($resultValue > 1) {
                if ($content->getTypeId() == 1) {
                    /** @var Media[] $resultContent */
                    $resultContent = $this->generatePlaylist($content);
                    array_unshift($resultContent, $content);
                    $starRepository = new StarResource();
                    $starTitle = $starRepository->getSubtitle($content->getId());
                    $playlist = new Playlist();
                    $playlistRepository = new PlaylistResource();
                    $playlist->setTitle($content->getTitle());
                    $playlist->setSubtitle($starTitle);
                    $playlist->setUrl('test');
                    $playlist->setCreatedAt(date('Y-m-d'));
                    $playlist->setPicture($content->getPicture());
                    $playlistId = $playlistRepository->save($playlist);

                    foreach ($resultContent as $currentContent) {
                        $playlistMedia = new \Musicome\Model\PlaylistMedia();
                        $playlistMediaRepository = new \Musicome\Model\ResourceModel\PlaylistMedia();
                        $playlistMedia->setMediaId($currentContent->getId());
                        $playlistMedia->setPlaylistId($playlistId);
                        $playlistMedia->setCreatedAt(date('Y-m-d'));
                        $playlistMediaRepository->save($playlistMedia);
                    }

                    $resultMedia[] = $playlistId;
                }
            }
        }

        shuffle($resultMedia);

        return array_slice($resultMedia, 0, 8);
    }

    public function generatePlaylist($content) {
        $similarity = new MediaSimilarity();
        $similarityResource = new MediaSimilarityResource();
        $similarityContent = $similarityResource->getSimilarContent($similarity, $content->getId(), 0.2);
        $media = new Media();
        $mediaRepository = new MediaRepository();
        $similarityContent = array_unique($similarityContent);
        $content = $mediaRepository->getById($media, $similarityContent);
        shuffle($content);
        return array_slice($content, 0, 8);
    }
}