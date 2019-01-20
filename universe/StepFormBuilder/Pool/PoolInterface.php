<?php


namespace StepFormBuilder\Pool;


/**
 * A persistent storage
 */
interface PoolInterface
{

    /**
     * @return array with the following data:
     *      - steps: array of stepId => saved data for this step
     *      - done: array of stepId => bool:isDone
     *      - active: the id of the active step
     *
     */
    public function getPool();

    public function setPool(array $data);


    /**
     * Get and set a particular value in the pool
     */
    public function getPoolValue($key, $default = null);

    public function setPoolValue($key, $value);


    /**
     * set/get the step data for a particular step
     */
    public function setPoolStepData($id, array $data);

    public function getPoolStepData($id);


    /**
     * set/get the done data for a particular step
     */
    public function setPoolStepDone($id, $isDone);

    public function getPoolStepDone($id);
}