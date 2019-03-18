<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 18:39
 */

include_once('UserController.php');
include_once('DashboardController.php');
include_once('../Repository/UserRepository.php');

class UserController extends BaseController {

    public function __construct(){}

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
                // @TODO Redirect to dashboard
                return;
            }
        }
        $this->render('login.view.php', $params);
    }

}
