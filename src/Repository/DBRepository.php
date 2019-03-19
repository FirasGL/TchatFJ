<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 20:59
 */

namespace TChatFJ\Repository;

use Infrastructure\DBConfig;

class DBRepository {

    public static function getDBInstance() {
        $config = DBConfig::getDbConfig();
        $connectionDB = mysqli_connect($config['database_host'], $config['database_user'], $config['database_password'], $config['database_name'], $config['database_port']);
        if (!$connectionDB) {
            die("Connection to database failed: " . mysqli_connect_error());
        }
        else {
            return $connectionDB;
        }
    }

    public static function disconnectDB($connectionDB) {
        mysqli_close($connectionDB);
    }
}
