<?php
namespace WPUtil\PostMeta;

abstract class Incrementer
{
    abstract public function getKey();

    public function increment($postId)
    {
        $m = new PostMeta($postId, $this->getKey());
        $count = $m->get();
        $m->addOrUpdate($count + 1);
    }
}
