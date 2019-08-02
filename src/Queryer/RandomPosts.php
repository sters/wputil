<?php
namespace WPUtil\Queryer;

use WP_Query;

class RandomPosts extends Queryer
{
    public function query()
    {
        return new WP_Query([
            'posts_per_page' => $this->options['posts_per_page'] ?? 10,
            'offset' => 0,
            'date_query' => [
                'after' => [
                    'year' => intval(date('Y')) - 1,
                    'month' => intval(date('m')),
                    'day' => intval(date('d')),
                ],
            ],
            'orderby' => 'rand',
            'order' => 'DESC',
        ]);
    }
}
