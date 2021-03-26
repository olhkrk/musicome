<?php
/**
 * Class Page
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;
use Musicome\Model\Stars as Model;
use Musicome\Model\ResourceModel\Stars as ResourceModel;

/**
 * Class Page
 */
class Page extends AbstractController
{
    /**
     * Index action
     */
    public function actionIndex()
    {
        $pageId = $_GET['page_id'];

        if ($pageId) {
            $resourceModel = new ResourceModel();
            $model = new Model();
            $res = $resourceModel->load($model, $pageId);

            $this->view->generate('page_view.php', 'template_view.php', $res);
        } else {
            header('Location: http://musicome.com');
        }
    }
}