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
        foreach ($this->functions as $func => $priority) {
            if (!function_exists($func)) {
                $func = $priority;
                $priority = 10;
            }
            add_filter($this->name, $func, $priority);
        }
    }

    public function remove()
    {
        foreach ($this->functions as $func => $priority) {
            if (!function_exists($func)) {
                $func = $priority;
                $priority = 10;
            }
            remove_filter($this->name, $func);
        }
    }
}
