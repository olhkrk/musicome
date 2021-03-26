<?php
/**
 * Class View
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Core;

/**
 * Class View
 */
class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    /**
     * Generate view
     *
     * @param $content_view
     * @param $template_view
     * @param null $data
     */
    public function generate($content_view, $template_view, $data = null)
    {
        include 'application/views/'.$template_view;
    }
}
