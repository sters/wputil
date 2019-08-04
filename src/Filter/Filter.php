<?php
namespace WPUtil\Filter;

use ReflectionFunction;

abstract class Filter
{
    protected $name = '';
    protected $func = '__return_Null';
    protected $priority = 10; // default

    public function add()
    {
        $argCount = 1;
        if ($this->func !== '' && is_callable($this->func)) {
            $ref = new ReflectionFunction($this->func);
            $argCount = $ref->getNumberOfParameters();
        } else {
            error_log(sprintf('[Filter] %s is not callable', $this->name));
        }

        return add_filter($this->name, $this->func, $this->priority, $argCount);
    }

    public function remove()
    {
        return remove_filter($this->name, $this->func);
    }
}
