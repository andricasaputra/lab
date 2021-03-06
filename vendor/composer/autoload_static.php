<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit27de10daeae3d0ad6d05f1c551977a7c
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Lab\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Lab\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Lab\\Clasess\\LegacyCetak' => __DIR__ . '/../..' . '/src/classes/Class_LegacyCetak.php',
        'Lab\\Clasess\\LegacyData' => __DIR__ . '/../..' . '/src/classes/Class_LegacyData.php',
        'Lab\\Clasess\\LegacyNomor' => __DIR__ . '/../..' . '/src/classes/Class_LegacyNomor.php',
        'Lab\\Clasess\\tanggal' => __DIR__ . '/../..' . '/src/classes/Class_tanggal.php',
        'Lab\\Config\\Database' => __DIR__ . '/../..' . '/src/config/Class_Database.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit27de10daeae3d0ad6d05f1c551977a7c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit27de10daeae3d0ad6d05f1c551977a7c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit27de10daeae3d0ad6d05f1c551977a7c::$classMap;

        }, null, ClassLoader::class);
    }
}
