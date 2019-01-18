<?php


namespace Registry;



interface RegistryInterface
{

    public function has($key);

    public function get($key, $default = null);

    public function set($key, $value);

}