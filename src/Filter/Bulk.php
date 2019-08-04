<?php
namespace WPUtil\Filter;

class Bulk extends Filter
{
    private $functions = [];

    public function __construct($name, $functions)
    {
        $this->name = $name;
        $this->functions = $functions;
    }

    public function add()
    {
        foreach ($this->functions as $func) {
            add_filter($this->name, $func);
        }
    }

    public function remove()
    {
        foreach ($this->functions as $func) {
            remove_filter($this->name, $func);
        }
    }
}
