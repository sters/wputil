<?php
namespace WPUtil\PostMeta;

class Vote extends Incrementer
{
    private $score;

    public function __construct($score)
    {
        $this->score = $score;
    }

    public function getKey()
    {
        return 'post_vote_' . $this->score;
    }
}
