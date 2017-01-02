<?php
/*
 * Autoloading classes using namespaces.
 *
 * @param string $class Path to the file with class. The separator is a backslash('\')
 * @return resource Require file with class
 */
function autoloader($class)
{
    $filePath = realpath(str_replace('\\', '/', __DIR__ . "\\..\\" . $class) . '.php');

    if (file_exists($filePath) && is_readable($filePath)) {
        require_once $filePath;
    } else {
        throw new Exception('File does not exists or is not readable.');
    }
}

/*
 * Replace default __autoload() to custom autoloader
 *
 * @param string Name custom autoload function
 */
spl_autoload_register('autoloader');