<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 20:31
 */

class DBConfig
{
    final public static function getDbConfig() {
        return array(
            "database_host" => "localhost",
            "database_user" => "root",
            "database_password" => "root",
            "database_name" => "tchat_fj",
            "database_port" => "",
        );
    }
}
