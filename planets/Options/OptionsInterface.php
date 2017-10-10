<?php


namespace Options;


interface OptionsInterface
{
    public function get($k, $default = null);
}