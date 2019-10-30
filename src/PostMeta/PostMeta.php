<?php
namespace WPUtil\PostMeta;

class PostMeta
{
    protected $postId;
    protected $key;

    public function __construct($postId, $key)
    {
        $this->postId = $postId;
        $this->key = $key;
    }

    public function get()
    {
        return get_post_meta($this->postId, $this->key, true);
    }

    public function add($value)
    {
        return add_post_meta($this->postId, $this->key, $value);
    }

    public function update($value)
    {
        return update_post_meta($this->postId, $this->key, $value);
    }

    public function addOrUpdate($value)
    {
        $v = $this->get();
        if ($v == '') {
            $this->delete();
            $this->add($value);
        } else {
            $this->update($value);
        }
    }

    public function delete()
    {
        return delete_post_meta($this->postId, $this->key);
    }
}
