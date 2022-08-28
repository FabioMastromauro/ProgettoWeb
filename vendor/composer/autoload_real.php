<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit994b6f65eab0450b5f030bf1d3bbbc1c
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

        spl_autoload_register(array('ComposerAutoloaderInit994b6f65eab0450b5f030bf1d3bbbc1c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit994b6f65eab0450b5f030bf1d3bbbc1c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit994b6f65eab0450b5f030bf1d3bbbc1c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
