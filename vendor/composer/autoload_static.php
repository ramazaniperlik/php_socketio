<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit89fe7fd414584e7d241869f32c0ae4d7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'E' => 
        array (
            'ElephantIO\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'ElephantIO\\' => 
        array (
            0 => __DIR__ . '/..' . '/wisembly/elephant.io/src',
            1 => __DIR__ . '/..' . '/wisembly/elephant.io/test',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit89fe7fd414584e7d241869f32c0ae4d7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit89fe7fd414584e7d241869f32c0ae4d7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit89fe7fd414584e7d241869f32c0ae4d7::$classMap;

        }, null, ClassLoader::class);
    }
}