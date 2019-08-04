<?php

namespace WPUtil\ViewHelper;

class RemoveTofu
{
    public static function apply($html)
    {
        $tofus = [
            "\x08",
            "\x1F",
        ];
        return str_replace($tofus, array_fill(0, count($tofus), ''), $html);
    }
}
