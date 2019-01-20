<?php


namespace Registry;


class Registry implements RegistryInterface
{
    protected $vars;

    public function __construct()
    {
        $this->vars = [];
    }

    public function has($key)
    {
        return array_key_exists($key, $this->vars);
    }

    public function get($key, $default = null)
    {
        return $this->vars[$key] ?? $default;
    }

    public function set($key, $value)
    {
        $this->vars[$key] = $value;
    }

}