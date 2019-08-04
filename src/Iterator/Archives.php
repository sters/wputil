<?php
namespace WPUtil\Iterator;

class Archives extends WpItems
{
    public function __construct()
    {
        $archives = wp_get_archives([
            'type' => 'monthly',
            'echo' => false,
            'show_post_count' => true,
            'format' => 'custom'
        ]);

        $this->items = explode("\n", $archives);
    }
}
