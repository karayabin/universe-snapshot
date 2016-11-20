<?php

namespace Uri2PageRouter\Module;

/*
 * LingTalfi 2015-12-04
 */

interface LinkGeneratorInterface
{


    /**
     * Return the uri corresponding to the given string (a page, or an identifier).
     * 
     * Some module require parameters.
     * The parameters array is used to target a module in particular.
     * 
     *
     * Returns false if the given string has no corresponding uri.
     *
     */
    public function generate($string, array $params);
}
