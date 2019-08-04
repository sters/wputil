<?php
namespace WPUtil\Filter;

class AlwaysTrue extends Filter
{
    public function __construct($name)
    {
        $this->name = $name;
        $this->func = '__return_true';
    }
}
