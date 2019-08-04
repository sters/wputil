<?php
namespace WPUtil\Filter;

class AlwaysNull extends Filter
{
    public function __construct($name)
    {
        $this->name = $name;
        $this->func = '__return_Null';
    }
}
