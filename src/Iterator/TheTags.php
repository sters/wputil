<?php
namespace WPUtil\Iterator;

class TheTags extends WpItems
{
    public function __construct($post)
    {
        $this->items = get_the_terms($post, 'post_tag')
    }
}
