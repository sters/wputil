<?php
namespace WPUtil\Filter;

class EnqueueScript extends Filter
{
    public function __construct($deregisters, $dequeues)
    {
        $this->name = 'wp_enqueue_scripts';
        $this->func = function () use ($deregisters, $dequeues) {
            foreach ($deregisters as $deregister) {
                wp_deregister_script($deregister);
                wp_deregister_style($deregister);
            }
            foreach ($dequeues as $dequeue) {
                wp_dequeue_script($dequeue);
                wp_dequeue_style($dequeue);
            }
        };
    }
}
