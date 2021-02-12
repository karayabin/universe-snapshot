<?php


namespace Ling\Light_Cli\CliTools\Program;

/**
 * The LightCliCommandInterface interface.
 */
interface LightCliCommandInterface
{


    /**
     * Returns the name of the command.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns the description of the command.
     *
     * @return string
     */
    public function getDescription(): string;

    /**
     * Returns the aliases used by this command.
     * It's an array of alias => real command.
     *
     * Note: the name is not an alias.
     *
     *
     *
     *
     *
     * @return array
     */
    public function getAliases(): array;


    /**
     * Returns the array of flags available for this command, which form is name => description.
     * Note: don't include the dash in your flag name, it's taken care of by light cli automatically.
     *
     * @return array
     */
    public function getFlags(): array;


    /**
     * Returns the array of available options for this command, which form is name => optionItem.
     *
     *
     * Each optionItem is an array with the following structure:
     *
     * - ?desc: string, the description of the option.
     * - ?values: array of possible values for this option.
     *      It's an array of value => description (which can be null if you want)
     *
     *
     *
     * @return array
     */
    public function getOptions(): array;


    /**
     * Returns the parameters available for this command.
     * It's an array of name => [description, isMandatory].
     *
     *
     * @return array
     */
    public function getParameters(): array;


}