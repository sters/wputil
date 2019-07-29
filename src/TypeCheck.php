<?php
namespace WPUtil;

class TypeCheck
{
    private static $enabled = true;

    public static function enable() {
        self::$enabled = true;
    }

    public static function disable() {
        self::$enabled = false;
    }

    public static function check(string $className, $instance): bool
    {
        if (!self::$enabled) {
            return true;
        }

        if (!is_object($instance)) {
            return false;
        }
        $ref = new \ReflectionClass($className);
        foreach ($ref->getMethods() as $method) {
            if (!method_exists($instance, $method->getName())) {
                return false;
            }
        }
        return true;
    }
}
