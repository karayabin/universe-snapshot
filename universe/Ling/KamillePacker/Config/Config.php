<?php


namespace Ling\KamillePacker\Config;


use Ling\KamillePacker\Config\Exception\ConfigException;

class Config implements ConfigInterface
{
    private $values;

    public function __construct()
    {
        $this->values = [];
    }


    public static function create()
    {
        return new static();
    }

    public function set($key, $value)
    {
        $this->values[$key] = $value;
        return $this;
    }

    public function get($key, $default = null, $throwEx = true)
    {
        if (array_key_exists($key, $this->values)) {
            return $this->values[$key];
        }
        if (true === $throwEx) {
            throw new ConfigException("Key not found: $key");
        }
        return $default;
    }
}
