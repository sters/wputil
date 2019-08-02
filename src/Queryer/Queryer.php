<?php
namespace WPUtil\Queryer;

use IteratorAggregate;

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
    protected $query;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function query()
    {
        $this->query = new \WP_Query($this->options);
        return $this->query;
    }

    public function havePosts()
    {
        return !is_null($this->query) && $this->query->have_posts();
    }

    public function thePost()
    {
        $this->query->the_post();
        return $this->query->post;
    }

    public function end()
    {
        if (!is_null($this->query)) {
            $this->query->reset_postdata();
        }
        unset($this->query);
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
