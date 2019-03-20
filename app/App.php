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
use TChatFJ\Controller\AJAX;

class App
{
    static public function handleRequest()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        if (isset($_REQUEST['page']) && $_REQUEST['page'] == "login" && !$_SESSION['loggedIn']) {
            $controller = new UserController();
            $controller->loginAction();
        }
        elseif (isset($_REQUEST['page']) && $_REQUEST['page'] == "register" && !$_SESSION['loggedIn']) {
            $controller = new UserController();
            $controller->registerAction();
        }
        elseif (isset($_REQUEST['page']) && $_REQUEST['page'] == "logout" && $_SESSION['loggedIn']) {
            $controller = new UserController();
            $controller->logoutAction();
        }
        elseif (isset($_REQUEST['page']) && $_REQUEST['page'] == "dashboard" && $_SESSION['loggedIn']) {
            $controller = new DashboardController();
            $controller->dashboardAction();
        }
        elseif (isset($_REQUEST['page']) && isset($_REQUEST['action']) && $_REQUEST['page'] == "ajax" && $_REQUEST['action'] == "getMessages" && $_SESSION['loggedIn']) {
            $controller = new AJAX();
            $controller->getMessages();
        }
        elseif (isset($_REQUEST['page']) && isset($_REQUEST['action']) && $_REQUEST['page'] == "ajax" && $_REQUEST['action'] == "sendMessage" && $_SESSION['loggedIn']) {
            $controller = new AJAX();
            $controller->sendMessage();
        }
        else {
            $controller = new DefaultController();
            $controller->invoke();
        }
    }

}
