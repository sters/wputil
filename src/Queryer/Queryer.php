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
    protected $lastPost;

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
        $this->lastPost = $GLOBALS['post'];
        $this->wpquery = $this->createQuery();
        return $this->wpquery;
    }

    protected function temporaryQuery(callable $func)
    {
        $temporary = false;
        if (empty($this->wpquery)) {
            $this->query();
            $temporary = true;
        }
        $result = $func($this->wpquery);
        if ($temporary) {
            $this->end();
        }
        return $result;
    }

    public function maxNumPages()
    {
        if (empty($this->wpquery)) {
            $this->query();
        }
        return $this->wpquery->max_num_pages;
    }

    public function havePosts()
    {
        if (empty($this->wpquery)) {
            $this->query();
        }
        return $this->wpquery->have_posts();
    }

    public function thePost()
    {
        if (empty($this->wpquery)) {
            $this->query();
        }
        $this->wpquery->the_post();
        return $this->wpquery->post;
    }

    public function end()
    {
        if (!is_null($this->wpquery)) {
            $this->wpquery->reset_postdata();
            $GLOBALS['post'] = $this->lastPost;
        }
        unset(
            $this->wpquery,
            $this->lastPost
        );
    }

    public function getIterator()
    {
        if (empty($this->wpquery)) {
            $this->query();
        }
        if ($this->havePosts()) {
            while ($this->havePosts()) {
                yield $this->thePost();
            }
        }
        $this->end();
    }
}
