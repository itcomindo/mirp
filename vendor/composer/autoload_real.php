<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit26ad4d0213eca6c6369dde9c83c34b8f
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit26ad4d0213eca6c6369dde9c83c34b8f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit26ad4d0213eca6c6369dde9c83c34b8f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit26ad4d0213eca6c6369dde9c83c34b8f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
