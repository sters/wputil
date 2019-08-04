<?php
namespace WPUtil\Filter;

class EnqueueScript extends Filter
{
    public function __construct($deregisters)
    {
        $this->name = 'wp_enqueue_scripts';
        $this->func = function () use ($deregisters) {
            foreach ($deregisters as $deregister) {
                wp_deregister_script($deregister);
                wp_deregister_style($deregister);
                wp_dequeue_script($deregister);
                wp_dequeue_style($deregister);
            }
        };
    }
}
