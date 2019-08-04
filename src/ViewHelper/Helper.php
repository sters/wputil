<?php

namespace WPUtil\ViewHelper;

class Helper
{
    public static function is_hatena_bookmark()
    {
        return stripos($_SERVER['HTTP_USER_AGENT'], 'Hatena::Bookmark') !== false;
    }
}
