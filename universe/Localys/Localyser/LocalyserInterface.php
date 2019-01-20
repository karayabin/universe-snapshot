<?php


namespace Localys\Localyser;

use Localys\Exception\LocalysException;
use Localys\LocalysInterface;


/**
 * A Localys finder.
 *
 */
interface LocalyserInterface
{
    /**
     * Return a Localys instance.
     *
     * @param null|string $lang , an iso 639-2 (alpha 3) code to override the default lang
     * @return LocalysInterface
     * @throws LocalysException if no Localys instance was found
     *
     */
    public function get($lang = null);
}