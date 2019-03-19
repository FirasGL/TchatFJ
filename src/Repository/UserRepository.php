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

    public function loginUser($username, $password)
    {
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

    public function getUserByUsername($username)
    {
        $DBInstance = $this->getDBInstance();
        $userEntity = array();
        if ($username) {
            $query = "SELECT * FROM user WHERE username = '{$username}'";
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

    public function registerUser($userEntered)
    {
        $registered = FALSE;
        $msg = NULL;
        if ($userEntered) {
            $user = $this->getUserByUsername($userEntered->getUsername());
            if ($user) {
                $msg = "The entered username is already in use.";
            }
            else {
                $userEntered->setPassword(password_hash($userEntered->getPassword(), PASSWORD_BCRYPT));
                $result = $this->addUser($userEntered);
                if ($result) {
                    $registered = TRUE;
                    $_SESSION['loggedIn'] = $result->getId();
                }
                else {
                    $msg = "Something went wrong.";
                }
            }
        }
        return array($registered, $msg);
    }

    public function addUser($userEntered)
    {
        $DBInstance = $this->getDBInstance();
        $added = FALSE;
        if ($userEntered) {
            $query = "
                INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
                    (NULL, '" . $userEntered->getUsername() . "', '" . $userEntered->getPassword() . "', '" . $userEntered->getFirstname() . "', '" . $userEntered->getLastname() . "');
                    ";
            $added = mysqli_query($DBInstance, $query);
        }
        $this->disconnectDB($DBInstance);
        return $added;
    }
}
