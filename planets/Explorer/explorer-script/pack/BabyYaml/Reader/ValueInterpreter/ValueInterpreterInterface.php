<?php



namespace BabyYaml\Reader\ValueInterpreter;


/**
 * ValueInterpreterInterface
 * @author Lingtalfi
 * 2015-02-27
 *
 */
interface ValueInterpreterInterface
{


    /**
     * @return mixed
     */
    public function getValue($line);

}
