<?php

namespace PhpTemplate\Pilot;

/*
 * LingTalfi 2016-02-03
 */
interface PhpTemplatePilotInterface
{

    /**
     * @param string $option - the option name
     * @return bool, whether or not the template has this option set to true
     */
    public function opt($option);
}
