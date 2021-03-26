<?php
/**
 * Class Route
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

/**
 * Class Route
 */
class Route
{
    /**
     * Start controller methods
     *
     * @return void
     */
    public static function start()
    {
        // controller and action by default
        $controller_name = 'Main';
        $action_name = 'Index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // get controller name
        if ( !empty($routes[1]) )
        {
            if ($position = stripos($routes[1], '?')) {
                $controller_name = substr($routes[1], 0, $position);
            } else {
                $controller_name = $routes[1];
            }
        }

        // get action name
        if ( !empty($routes[2]) )
        {
            $action_name = ucfirst($routes[2]);
        }

        // add prefixes
        $model_name = $controller_name;
        $action_name = 'action'.$action_name;

        // add model class if it exist

        $model_file = ucfirst($controller_name).'.php';
        $model_path = "application/Model/".$model_file;
        if(file_exists($model_path))
        {
            include "application/Model/".$model_file;
        }

        // add controller class
        $controller_file = ucfirst($controller_name).'.php';
        $controller_path = "application/Controller/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/Controller/".$controller_file;
        }
        else
        {
            self::ErrorPage404();
        }

        // create controller
        $controller = new $controller_name();
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // get controller action
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
