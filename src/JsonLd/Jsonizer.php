<?php
namespace WPUtil\JsonLd;

use ArrayAccess;

class Jsonizer implements ArrayAccess {
    protected $json = [];

    public function getHTML()
    {
        return '<script type="application/ld+json">' . $this->getJSON() . '</script>';
    }

    public function getJSON()
    {
        return json_encode($this->json);
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->json[] = $value;
        } else {
            $this->json[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->json[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->json[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->json[$offset]) ? $this->json[$offset] : null;
    }
}
