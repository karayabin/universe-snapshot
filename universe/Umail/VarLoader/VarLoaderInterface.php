<?php


namespace Umail\VarLoader;


interface VarLoaderInterface
{

    /**
     * Takes an email and returns the corresponding variables,
     * which are meant to be used in a template (or some equivalent).
     */
    public function getVariables($email);

}