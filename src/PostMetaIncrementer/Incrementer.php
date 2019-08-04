<?php
namespace WPUtil\PostMetaIncrementer;

abstract class Incrementer
{
    abstract public function getKey();

    public function increment($postId)
    {
        $metaKey = $this->getKey();
        $count = get_post_meta($postId, $metaKey, true);
        if ($count == '') {
            delete_post_meta($postId, $metaKey);
            add_post_meta($postId, $metaKey, '1');
        } else {
            $count++;
            update_post_meta($postId, $metaKey, $count);
        }
    }
}
