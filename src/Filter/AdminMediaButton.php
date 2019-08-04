<?php
namespace WPUtil\Filter;

abstract class AdminMediaButton extends Filter
{
    public function __construct()
    {
        $this->name = 'media_buttons';
        $this->func = function () {
            return $this->hook();
        };
    }

    abstract public function hook();
}
