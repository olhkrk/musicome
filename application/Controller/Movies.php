<?php
/**
 * Class Movies
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;

/**
 * Class Movies
 */
class Movies extends AbstractController
{
    /**
     * Index action
     */
    public function actionIndex()
    {
        $this->view->generate('movies/index_view.php', 'movies_template_view.php');
    }
}