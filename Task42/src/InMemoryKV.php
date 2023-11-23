<?php

namespace App;

class InMemoryKV implements KeyValueStorageInterface, \Serializable
{
    private $map;

    public function __construct($initial = [])
    {
        $this->map = $initial;
    }

    public function set($key, $value)
    {
        $this->map[$key] = $value;
    }

    public function unset($key)
    {
        unset($this->map[$key]);
    }

    public function get($key, $default = null)
    {
        return $this->map[$key] ?? $default;
    }

    public function toArray()
    {
        return $this->map;
    }

    public function serialize()
    {
        return json_encode($this->map);
    }
    public function unserialize($data)
    {
        $this->map = json_decode($data, true);
    }
}
