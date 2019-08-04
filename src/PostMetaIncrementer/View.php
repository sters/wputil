<?php
namespace WPUtil\PostMetaIncrementer;

class View extends Incrementer
{
    public function getKey()
    {
        return 'post_views_count';
    }
}
