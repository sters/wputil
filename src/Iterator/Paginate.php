<?php
namespace WPUtil\Iterator;

class Paginate extends WpItems
{
    public function __construct($current, $total)
    {
        $this->items = paginate_links([
            'current' => max(1, $current),
            'total' => $total,
            'type' => 'array',
            'show_all' => true,
            'prev_text' => '&laquo; 前へ',
            'next_text' => '次へ &raquo;',
        ]);
    }
}
