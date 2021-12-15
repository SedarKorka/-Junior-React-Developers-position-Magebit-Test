<?php

namespace autoloader;

/**
 * Description of Autoloader
 *
 * @author GUSTAVO
 */
class Autoloader {
    public static function register(): void {
        spl_autoload_register(function(string $class): void {
            require_once (str_replace ("\\", "/", "{$class}.php"));
        });
    }

}
