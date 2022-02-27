<?php

namespace Lab\classes;

define("BASEPATH", dirname(dirname(__DIR__)));
define("REALPATH", __DIR__);

define("FULL_URL_IMAGES_PATH", dirname($_SERVER["SERVER_NAME"] . "/lab/assets/img/logoskp4.jpg"));

class Init
{

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
        return FULL_URL_IMAGES_PATH;
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
