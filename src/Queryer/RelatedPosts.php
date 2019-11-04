<?php
namespace WPUtil\Queryer;

use WP_Query;

class RelatedPosts extends Queryer
{
    protected function createQuery()
    {
        $tags = \wp_get_post_tags(
            $this->options['id'],
            ['orderby' => 'count', 'order' => 'ASC']
        );
        if (empty($tags)) {
            return null;
        }

        if (count($tags) >= 2) {
            array_pop($tags);
        }
        $tags = array_map(function ($tag) {
            return $tag->term_id;
        }, $tags);

        $relatedQuery = new WP_Query([
            'tag__in' => $tags,
            'post__not_in' => [$this->options['id']],
            'showposts' => 5,
        ]);

        return $relatedQuery;
    }
}
