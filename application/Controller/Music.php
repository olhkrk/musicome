<?php
/**
 * Class Music
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;
use Musicome\Model\PlaylistMedia;

/**
 * Class Music
 */
class Music extends AbstractController
{
    /**
     * Index action
     */
    public function actionIndex()
    {
        $playlistMedia = new PlaylistMedia();
        $playlistMediaResource = new \Musicome\Model\ResourceModel\PlaylistMedia();
        $playlistMediaList = $playlistMediaResource->load(
            $playlistMedia,
            $_REQUEST['playlistId'],
            PlaylistMedia::PLAYLIST_ID
        );
        $mediaIds = [];

        /** @var PlaylistMedia $playlistMedia */
        foreach ($playlistMediaList as $playlistMedia) {
            $mediaIds[] = $playlistMedia->getMediaId();
        }

        $media = new \Musicome\Model\ResourceModel\Media();
        $mediaResource = new \Musicome\Model\ResourceModel\Media();
        $contentArray = $mediaResource->getAllById($media, $mediaIds);
        $this->view->generate('music/index_view.php', 'template_view.php', $contentArray);
    }
    /**
     * Search action
     */
    public function actionSearch()
    {
        $this->view->generate('music/search_view.php', 'template_view.php');
    }
}