<?php
/**
 * Class About
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;

/**
 * Class About
 */
class About extends AbstractController
{
    /**
     * Index action
     */
    public function actionIndex()
    {
        $this->view->generate('about/index_view.php', 'template_view.php');
    }
}