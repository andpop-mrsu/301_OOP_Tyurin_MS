<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2e93f8bc9deb0ac54cb7e11a1549c446
{
    public static $files = array (
        '6c445daf49ab80ec2d1911eca627dba4' => __DIR__ . '/../..' . '/src/Test.php',
        '655c65f39ae761e2db5b57a85c8d4474' => __DIR__ . '/../..' . '/src/Functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2e93f8bc9deb0ac54cb7e11a1549c446::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2e93f8bc9deb0ac54cb7e11a1549c446::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2e93f8bc9deb0ac54cb7e11a1549c446::$classMap;

        }, null, ClassLoader::class);
    }
}
