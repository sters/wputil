<?php
namespace WPUtil\Iterator;

class Tags extends WpItems
{
    public function __construct($number = 20)
    {
        $this->items = get_terms(
            'post_tag',
            [
                'orderby' => 'count',
                'order' => 'desc',
                'number' => $number,
            ]
        );
    }
}
