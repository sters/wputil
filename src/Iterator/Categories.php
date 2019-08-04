<?php
namespace WPUtil\Iterator;

class Categories extends WpItems
{
    public function __construct()
    {
        $this->items = get_categories([
            'orderby' => 'count',
            'order' => 'DESC',
        ]);
    }
}
