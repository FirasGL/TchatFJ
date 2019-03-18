<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 18:33
 */

include_once('UserController.php');
include_once('DashboardController.php');

class DefaultController {

    public function __construct()
    {
        if (!isset($_SESSION['loggedIn'])) {
            $controller = new UserController();
            $controller->loginAction();
        }
        else {
            $controller = new DashboardController();
            $controller->DashboardAction();
        }
    }

    public function invoke()
    {
    }
}
