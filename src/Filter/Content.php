<?php
namespace WPUtil\Filter;

class Content extends Filter
{
    private $titleHook;
    private $bodyHook;

    /**
     * constructor
     *
     * @param callable $titleHook function (string): string
     * @param callable $bodyHook function (string): string
     */
    public function __construct($titleHook, $bodyHook)
    {
        $this->titleHook = $titleHook;
        $this->bodyHook = $bodyHook;
    }

    public function add()
    {
        $this->name = 'the_title';
        $this->func = $this->titleHook;
        parent::add();

        $this->name = 'the_content';
        $this->func = $this->bodyHook;
        parent::add();
    }
}
