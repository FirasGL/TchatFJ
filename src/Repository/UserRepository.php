<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 20:16
 */

namespace TChatFJ\Repository;

use TChatFJ\Entity\User;

include_once('../Entity/User.php');

class UserRepository extends DBRepository {

    public function __construct() {
    }

    public function loginUser($username, $password) {
        $logged = FALSE;
        if ($username && $password) {
            $user = $this->getUserByUsername($username);
            if ($user) {
                $checkPassword = password_verify($password, $user->getPassword());
                if ($checkPassword) {
                    $_SESSION['loggedIn'] = $user->getId();
                    $logged = TRUE;
                }
            }
        }
        return $logged;
    }

    public function getUserByUsername($username) {
        $DBInstance = $this->getDBInstance();
        $userEntity = array();
        if ($username) {
            $query = "SELECT * FROM user WHERE username = {$username}";
            $result = mysqli_query($DBInstance, $query);
            if (mysqli_num_rows($result) > 0) {
                while($user = mysqli_fetch_assoc($result)) {
                    $userEntity = new User($user);
                }
            }
        }
        $this->disconnectDB($DBInstance);
        return $userEntity;
    }
}
