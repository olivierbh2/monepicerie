<?php

abstract class FactoryBase
{

    protected function dbConnect()
    {

        $servername = "127.0.0.1";
        $username = "root";
        $password = "root";

        $db = new \PDO('mysql:host=' . $servername . ';port=3306;dbname=h24_web_transac_1732451;charset=utf8', $username, $password);
        return $db;
    }
}
?>