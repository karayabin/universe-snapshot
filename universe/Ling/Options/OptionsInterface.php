<?php


namespace Ling\Options;


interface OptionsInterface
{
    public function get($k, $default = null);
}