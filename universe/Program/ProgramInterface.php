<?php


namespace Program;


interface ProgramInterface
{

    /**
     * fn ( CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program )
     */
    public function addCommand($name, callable $fn);


    /**
     * throwEx:
     *      - if true, throws an exception if the command is not found.
     *      - if false, simply sends an error to the output, but don't actually interrupt the program
     *
     *
     * This method was added so that one can execute a command within a command.
     */
    public function executeCommand($name, $throwEx = true);

}

