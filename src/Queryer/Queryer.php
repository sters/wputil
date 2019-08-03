<?php
namespace WPUtil\Queryer;

use IteratorAggregate;
use WP_Query;

/**
 * Queryer
 *
 * Simple usage:
 * $queryer = new Queryer([
 *     'category_name' => 'news',
 * ]);
 * $queryer->query();
 * if ($queryer->havePosts()) {
 *     while ($queryer->havePosts()) {
 *         $queryer->thePost();
 *         the_title();
 *     }
 *     $queryer->end();
 * }
 *
 * Alternate usage:
 * $queryer = new Queryer([
 *     'category_name' => 'news',
 * ]);
 * foreach($queryer as $post) {
 *     the_title();
 * }
 */
class Queryer implements IteratorAggregate
{
    protected $options;
    protected $wpquery;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    protected function createQuery()
    {
        return new WP_Query($this->options);
    }

    public function query()
    {
        $this->wpquery = $this->createQuery();
        return $this->wpquery;
    }

    public function havePosts()
    {
        return !is_null($this->wpquery) && $this->wpquery->have_posts();
    }

    public function thePost()
    {
        $this->wpquery->the_post();
        return $this->wpquery->post;
    }

    public function end()
    {
        if (!is_null($this->wpquery)) {
            $this->wpquery->reset_postdata();
        }
        unset($this->wpquery);
    }

    public function getIterator()
    {
        $this->query();
        if ($this->havePosts()) {
            while ($this->havePosts()) {
                yield $this->thePost();
            }
            $this->end();
        }
    }
}
