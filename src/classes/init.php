<?php

namespace Lab\classes;

use Lab\config\Database;

define("BASEPATH", dirname(dirname(__DIR__)));
define("REALPATH", __DIR__);

class Init 
{
    protected static $production = true;

    public static function basePath()
    {
        return BASEPATH;
    }

    public static function realPath()
    {
        return REALPATH;
    }

    public static function imagesPath()
    {
        if(self::$production)
        {
            return dirname($_SERVER["SERVER_NAME"] . "/assets/img/logoskp4.jpg");
            
        } else {

            return dirname($_SERVER["SERVER_NAME"] . "/lab/assets/img/logoskp4.jpg");
        }
    }

    public static function SorceDataPath()
    {

        return self::basePath() . "/kt/";
    }

    public static function SorceDataPathKhLabBakteri()
    {

        return self::basePath() . "/kh/";
    }

    public static function SorceDataPathKhLabParasit()
    {

        return self::basePath() . "/kh/";
    }

}
