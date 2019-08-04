<?php
namespace WPUtil\Filter;

class Register
{
    private $addFilterList = [];
    private $removeFilterList = [];

    public function add(Filter $filter)
    {
        $this->addFilterList[] = $filter;
    }

    public function remove(Filter $filter)
    {
        $this->removeFilterList[] = $filter;
    }

    public function register()
    {
        foreach ($this->addFilterList as $filter) {
            $filter->add();
        }
        foreach ($this->removeFilterList as $filter) {
            $filter->remove();
        }
    }
}
