<?php
namespace App;

use App\ObjInterface;
use ArrayAccess;

class Obj implements ObjInterface, ArrayAccess
{
    private array $object;

    public function __construct($array)
    {
        foreach ($array as $key => $value) {
            !is_array($value) ? $this->object[$key] = $value : $this->object[$key] = new Obj($value);
        }
    }
    public function __get($key)
    {
        return $this->object[$key] ?? null;
    }

    public function __set($key, $value)
    {
        $this->object[$key] = $value;
    }

    public function offsetExists(mixed $key): bool
    {
        return isset($this->object[$key]);
    }

    public function offsetGet(mixed $key): mixed
    {
        return isset($this->object[$key]) ? $this->object[$key] : null;
    }

    public function offsetSet(mixed $key, mixed $value): void
    {
        $this->object[$key] = $value;
    }

    public function offsetUnset(mixed $key): void
    {
        unset($this->object[$key]);
    }
}

