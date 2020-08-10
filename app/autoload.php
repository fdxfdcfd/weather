<?php
define('BASE_DIR', __DIR__. DIRECTORY_SEPARATOR);
$Directory = new RecursiveDirectoryIterator(BASE_DIR);
$Iterator = new RecursiveIteratorIterator($Directory);
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
spl_autoload_register(function ($className) {
    $className = ltrim($className, '\\');
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once __DIR__. DIRECTORY_SEPARATOR . 'code' . DIRECTORY_SEPARATOR . $className .'.php';
});
foreach($Regex as $class) {
    if (is_array($class)) {
        foreach($class as $c) {
            require_once $c;
        }
    } else {
        require_once $class;
    }
}