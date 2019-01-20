<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\String\StringIterator;


/**
 * StringIteratorInterface
 * @author Lingtalfi
 * 2015-05-12
 *
 *
 * Moves a cursor forward along a string.
 *
 *
 */
interface StringIteratorInterface
{

    /**
     * @return bool, true while there is at least one char after the current position,
     *                  or false when the cursor is either at the last position
     *                  or out of bounds.
     *
     */
    public function isValid();

    /**
     * moves the cursor to the next position
     */
    public function next();

    /**
     * @return string, the current char, 
     *              or an empty string if the position is not valid
     */
    public function current();

    public function setPosition($p);

    public function getPosition();

    public function setString($s);

    public function getString();

}
