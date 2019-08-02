<?php
namespace WPUtil\Queryer;

class RecentPosts extends Queryer
{
    public function query()
    {
        return new \WP_Query([
            'posts_per_page' => $this->options['posts_per_page'] ?? 10,
            'offset' => 0,
            'order' => 'DESC',
            'orderby' => 'date'
        ]);
    }
}
