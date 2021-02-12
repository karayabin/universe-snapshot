<?php


namespace Ling\CliTools\Input;


/**
 * The WritableCommandLineInput class.
 */
class WritableCommandLineInput extends CommandLineInput
{
    /**
     * Sets the flags.
     *
     * @param array $flags
     */
    public function setFlags(array $flags)
    {
        $this->flags = $flags;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Sets the parameters.
     * By default, parameters indexes are rewritten.
     * Set $rewriteIndexes to false if you don't want that.
     *
     * @param array $parameters
     * @param bool $rewriteIndexes
     */
    public function setParameters(array $parameters, bool $rewriteIndexes = true)
    {
        $this->parameters = $parameters;
        if (true === $rewriteIndexes) {
            $this->rewriteParameterIndexes();
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Rewrite the parameter indexes
     */
    private function rewriteParameterIndexes(): void
    {
        $i = 1;
        $parameters = $this->parameters;
        $this->parameters = [];
        foreach ($parameters as $name) {
            $this->parameters[$i] = $name;
            $i++;
        }
    }


}