<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8291f2d31bfe1d141b057da9f91956d
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PHPGangsta_GoogleAuthenticator' => __DIR__ . '/../..' . '/PHPGangsta/GoogleAuthenticator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitb8291f2d31bfe1d141b057da9f91956d::$classMap;

        }, null, ClassLoader::class);
    }
}