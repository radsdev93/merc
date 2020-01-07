<?php

namespace RAdSDev93\MercLegacy\Infra;

use PDO;

include './../../config/config.php';
class Connection
{
    public static function connect()
    {
        $connection = new PDO(DB_DRIVE . ':host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}