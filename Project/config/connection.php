<?php

class Config
{
    public static $db_host = "localhost";
    public static $db_user = "root";
    public static $db_pass = ""; 
    public static $db_name = "tp_mvc25";

    public static function getDSN()
    {
        return "mysql:host=" . self::$db_host . ";dbname=" . self::$db_name;
    }
}
?>