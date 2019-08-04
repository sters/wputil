<?php
namespace WPUtil\Iterator;

use Iterator;
use IteratorAggregate;
use Traversable;
use ArrayIterator;

// Iterator of WordPress items
// like this: foreach (new TagsIterator as $tag) { ... }
abstract class WpItems implements IteratorAggregate
{
    protected $items;

    public function getIterator()
    {
        if ($this->items instanceof Iterator) {
            return $this->items;
        }

        if ($this->items instanceof Traversable || is_array($this->items)) {
            return new ArrayIterator($this->items);
        }

        return new ArrayIterator([]);
    }
}
