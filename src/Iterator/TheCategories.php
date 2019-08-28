<?php
namespace WPUtil\Iterator;

class TheCategories extends WpItems
{
    public function __construct($post)
    {
        $this->items = get_the_terms($post, 'category');
    }
}
