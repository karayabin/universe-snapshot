<?php


namespace Ling\StepFormBuilder;


use Ling\StepFormBuilder\Step\StepInterface;

interface StepFormBuilderInterface
{


    /**
     * All steps should be register in order of appearance
     */
    public function registerStep($id, StepInterface $step);


    public function reset();

    /**
     * @param $id
     * @return array, the step model
     * @throws \Exception if the step with given id is not defined
     */
    public function getStepModel($id);

    /**
     * @param $id
     * @return string, the state of the step
     *          - unknown
     *          - active
     *          - done
     *          - inactive
     *
     * @throws \Exception if the step doesn't exist
     */
    public function getStepState($id);

    /**
     * @return string, the key chosen for detecting steps in the POST array
     * It should be set on previous step buttons.
     */
    public function getPrevStepKey();

    /**
     * @return string, the key chosen for detecting reset method trigger;
     * it's passed via the POST array.
     */
    public function getResetKey();

    /**
     * @return string, the key to use in the POST array to redirect to a specific
     * step.
     */
    public function getStepKey();


    public function setActiveStep($id);


    /**
     * Defines a group of steps.
     *
     * When multiple steps are grouped together, the stepFormBuilder instance
     * will activate the first element of the group in the following cases:
     *
     * - the user comes back to a different group of steps using the previous submit button
     * - the user clicks and lands in a group of step
     *
     *
     *
     * @param array $groupIds , array of group ids
     */
    public function addGroup(array $groupIds);

}