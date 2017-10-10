<?php


namespace KamillePacker\Config;


interface ConfigInterface
{

    public function set($key, $value);

    public function get($key, $default = null, $throwEx = true);
}
