<?php
namespace WPUtil\Filter;

class RemoveThumbnailSize extends Filter
{
    public function add()
    {
        $f = function ($html) {
            return preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
        };

        add_filter('post_thumbnail_html', $f);
        add_filter('image_send_to_editor', $f);
    }
}
