<?php
namespace WPUtil\Filter;

class PreCommentUserIp extends Filter
{
    public function __construct()
    {
        $this->name = 'pre_comment_user_ip';
        $this->func = function () {
            $addr = $_SERVER['REMOTE_ADDR'];
            if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $forwarded = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
                $addr = trim($forwarded[0]);
            }
            return $addr;
        };
    }
}
