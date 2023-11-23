<?php

namespace App;
class InMemoryKV
{
    private array $data;

    public function __construct($initial = [])
    {
        $this->data = $initial;
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function unset($key)
    {
        unset($this->data[$key]);
    }

    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function toArray()
    {
        return $this->data;
    }
}