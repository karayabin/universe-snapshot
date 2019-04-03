<?php

namespace Ling\EasyConsoleMenu\History;


/**
 * The HistoryInterface interface.
 *
 */
interface HistoryInterface
{


    /**
     * Returns the name of the last step, and removes it from the history.
     * False is returned if there is no last step.
     *
     * @return string|false
     */
    public function pop();


    /**
     * Adds a step to the history.
     *
     *
     * @param string $stepName
     * @return mixed
     */
    public function add(string $stepName);


    /**
     * Returns the name of the last step, or false if there is no step at all.
     * @return string|false
     */
    public function last();

    /**
     * Returns the name of the first step, or false if there is no step at all.
     * @return string|false
     */
    public function first();


    /**
     * Returns the number of elements in the history.
     * @return int
     */
    public function count(): int;

    /**
     * Clears the history.
     */
    public function clear();


    /**
     * Returns the history step names.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Returns whether the history contains the given stepName.
     * @param string $stepName
     * @return bool
     */
    public function has(string $stepName): bool;

    /**
     * If the given stepName is in the history, pops every steps (from the end) until it reaches
     * the given stepName, and including the stepName (i.e. it also pops the stepName).
     * Returns whether the given stepName was in the history in the first place.
     *
     * Note: this method does nothing if the stepName is not in the history.
     *
     * @param string $stepName
     * @return bool
     */
    public function popUntil(string $stepName): bool;

}