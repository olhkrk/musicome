<?php
/**
 * Class Channel
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;

/**
 * Class Channel
 */
class Channel extends AbstractController
{
    /**
     * Index action
     */
    public function actionIndex()
    {
        $this->view->generate('channel/index_view.php', 'template_view.php');
    }
}