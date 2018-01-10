<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e5b3cc849921b5e9edc1ffcd9547c3e
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1e5b3cc849921b5e9edc1ffcd9547c3e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1e5b3cc849921b5e9edc1ffcd9547c3e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
