<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 21:50
 */

class BaseController {

    protected function render($template, $params = array())
    {
        extract($params);
        include ('../src/Views/' . $template);

    }

    protected function redirectUrl($url)
    {
        header("location: $url", true, 301);
        exit();
    }
}
