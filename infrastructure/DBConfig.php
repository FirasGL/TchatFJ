<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 20:31
 */

namespace Infrastructure;

class DBConfig
{
    final public static function getDbConfig() {
        return array(
            "database_host" => "127.0.0.1",
            "database_user" => "root",
            "database_password" => "root",
            "database_name" => "tchat_fj",
            "database_port" => "3306",
        );
    }
}
