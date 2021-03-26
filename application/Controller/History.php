<?php
/**
 * Class History
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;

/**
 * Class History
 */
class History extends AbstractController
{
    /**
     * Index action
     */
    public function actionIndex()
    {
        $this->view->generate('history/index_view.php', 'template_view.php');
    }
}