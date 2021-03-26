<?php
/**
 * Class Movie
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;
use Musicome\Model\Media as Model;
use Musicome\Model\ResourceModel\Media as ResourceModel;

/**
 * Class Movie
 */
class Movie extends AbstractController
{
    /**
     * Index action
     */
    public function actionIndex()
    {
        $this->view->generate('movie/index_view.php', 'movies_template_view.php');
    }
    /**
     * Search action
     */
    public function actionSearch()
    {
        $this->view->generate('movie/search_view.php', 'template_view.php');
    }
}