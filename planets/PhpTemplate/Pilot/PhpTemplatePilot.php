<?php

namespace PhpTemplate\Pilot;

/*
 * LingTalfi 2016-02-03
 */
class PhpTemplatePilot implements PhpTemplatePilotInterface
{
    private $options;

    public function __construct(array $options)
    {
        $this->options = $options;
    }


    public function opt($option)
    {
        return (array_key_exists($option, $this->options) && true === $this->options[$option]);
    }
}
