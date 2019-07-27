<?php

namespace WPUtil;

class TypeCheck
{
    public static function check(string $className, $instance): bool
    {
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
