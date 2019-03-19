<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 18:33
 */

namespace TChatFJ\Controller;

class DefaultController {

    public function invoke()
    {
        if (!isset($_SESSION['loggedIn'])) {
            header("location: /index.php?page=login", true, 301);
            exit();
        }
        else {
            header("location: /index.php?page=dashboard", true, 301);
            exit();
        }
    }
}
