<?php
/**
 * Class Controller
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Core;

use Musicome\Core\Model as MusicomeModel;
use Musicome\Core\View as MusicomeView;

/**
 * Class Controller
 */
class AbstractController
{
    /** @var MusicomeModel $model */
    public $model;

    /** @var MusicomeView $view */
    public $view;

    /**
     * AbstractController constructor.
     *
     * @param MusicomeView $view
     */
    public function __construct(
    ) {
        $this->view = new View();
    }

    /**
     * Action index
     *
     * @return void
     */
    protected function actionIndex()
    {

    }
}