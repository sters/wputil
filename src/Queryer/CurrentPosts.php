<?php
namespace WPUtil\Queryer;

class CurrentPosts extends Queryer
{
    protected function createQuery()
    {
        global $wp_query;
        return $wp_query;
    }
}
