<?php

namespace WPUtil\ViewHelper;

class InlineCodeReplacer
{
    public static function apply($html)
    {
        return preg_replace_callback('/<pre><code>([\s\S]+?)<\/code><\/pre>/', function ($matched) {
            $content = esc_html($matched[1]);
            return "<pre><code>{$content}</code></pre>";
        }, $html);
    }
}
