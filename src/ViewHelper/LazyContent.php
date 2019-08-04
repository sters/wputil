<?php

namespace WPUtil\ViewHelper;

class LazyContent
{
    private static $contents = [];

    public static function start()
    {
        ob_start();
    }

    public static function end()
    {
        static::$contents[] = ob_get_contents();
        ob_end_clean();
    }

    public static function show()
    {
        echo implode("\n", static::$contents);
        static::$contents = [];
    }
}
