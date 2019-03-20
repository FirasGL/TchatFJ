<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 18:39
 */

namespace TChatFJ\Controller;

use TChatFJ\Repository\UserRepository;
use TChatFJ\Entity\User;

class UserController extends BaseController {

    public function loginAction()
    {
        $params = array();
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userRepo = new UserRepository();
            $logged = $userRepo->loginUser($username, $password);
            if (!$logged) {
                $params['error'] = "Sorry, you entered an incorrect login or password";
            }
            else {
                header("location: /index.php?page=dashboard", true, 301);
                exit();
            }
        }
        $this->render('login.view.php', $params);
    }

    public function registerAction()
    {
        $params = array();
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $userObject = array(
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'firstname' => $_POST['firstname'] ? $_POST['firstname'] : NULL,
                'lastname' => $_POST['lastname'] ? $_POST['lastname'] : NULL,
            );
            $user = new User($userObject);
            $userRepo = new UserRepository();
            list($registered, $msg) = $userRepo->registerUser($user);
            if (!$registered) {
                $params['error'] = $msg;
            }
            else {
                header("location: /index.php?page=dashboard", true, 301);
                exit();
            }
        }
        $this->render('register.view.php', $params);
    }

    public function logoutAction()
    {
        $_SESSION['loggedIn'] = NULL;
        header("location: /index.php?page=login", true, 301);
        exit();
    }

}
