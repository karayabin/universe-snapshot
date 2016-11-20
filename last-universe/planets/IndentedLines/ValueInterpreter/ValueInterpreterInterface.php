<?php

namespace IndentedLines\ValueInterpreter;


/**
 * ValueInterpreterInterface
 * @author Lingtalfi
 * 2015-12-14
 *
 */
interface ValueInterpreterInterface
{
    /**
     * @return mixed
     */
    public function getValue($line);

}
