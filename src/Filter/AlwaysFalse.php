<?php
namespace WPUtil\Filter;

class AlwaysFalse extends Filter
{
    public function __construct($name)
    {
        $this->name = $name;
        $this->func = '__return_false';
    }
}
