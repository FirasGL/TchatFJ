<?php
/**
 * Created by PhpStorm.
 * User: hatem
 * Date: 30/01/18
 * Time: 17:56
 */

use TChatFJ\Controller\UserController;
use TChatFJ\Controller\DashboardController;
use TChatFJ\Controller\DefaultController;

class App
{
    static public function handleRequest()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        if (isset($_REQUEST['page']) && $_REQUEST['page'] == "login") {
            $controller = new UserController();
            $controller->loginAction();
        }
        elseif (isset($_REQUEST['page']) && $_REQUEST['page'] == "dashboard") {
            $controller = new DashboardController();
            $controller->dashboardAction();
        }
        else {
            $controller = new DefaultController();
            $controller->invoke();
        }
    }

}
