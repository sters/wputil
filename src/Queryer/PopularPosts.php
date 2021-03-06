<?php
namespace WPUtil\Queryer;

use WP_Query;

class PopularPosts extends Queryer
{
    protected function createQuery()
    {
        return new WP_Query([
            'posts_per_page' => $this->options['posts_per_page'] ?? 10,
            'offset' => 0,
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        ]);
    }
}
