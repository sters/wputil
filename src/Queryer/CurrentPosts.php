<?php
namespace WPUtil\Queryer;

class CurrentPosts extends Queryer
{
    public function query()
    {
        global $wp_query;
        return $wp_query;
    }
}
