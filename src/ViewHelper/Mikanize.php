<?php

namespace WPUtil\ViewHelper;

use Mikan\Mikan;

class Mikanize
{
    public static function apply($str)
    {
        if (strpos($str, '&#') !== false) {
            return $str;
            $str = mb_convert_encoding($str, 'UTF-8', 'HTML-ENTITIES');
        }
        $words = (new Mikan)->split($str);
        $words = array_map(function ($word) {
            $word = esc_html(str_replace(' ', '&nbsp;', $word));
            return '<span style="display:inline-block" role="presentation">' . $word . '</span>';
        }, $words);

        return implode('', $words);
    }
}
