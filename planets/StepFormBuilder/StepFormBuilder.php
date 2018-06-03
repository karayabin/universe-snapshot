<?php


namespace StepFormBuilder;


use Bat\SessionTool;
use StepFormBuilder\Exception\StepFormBuilderException;
use StepFormBuilder\Pool\PoolInterface;
use StepFormBuilder\Pool\SessionPool;
use StepFormBuilder\Step\StepInterface;

class StepFormBuilder implements StepFormBuilderInterface
{

    /**
     * @var array of stepId => parentStepId
     */
    private $stepId2Parent;
    /**
     * @var array of stepId => StepInterface
     */
    private $stepInstances;
    private $initialized;
    private $states;
    private $prevKey;
    private $stepKey;
    private $resetKey;
    private $groups;

    /**
     * @var PoolInterface
     */
    private $pool;

    public function __construct()
    {
        SessionTool::start();
        $this->stepId2Parent = [];
        $this->stepInstances = [];
        $this->states = [];
        $this->initialized = false;
        $this->prevKey = "__step__";
        $this->stepKey = "__stepkey__";
        $this->resetKey = "__reset__";
        $this->groupCpt = 0;
        $this->groups = [];
        $this->pool = null;
    }


    public function getPrevStepKey()
    {
        return $this->prevKey;
    }

    public function registerStep($id, StepInterface $step)
    {
        $this->stepInstances[$id] = $step;
        return $this;
    }

    public function addGroup(array $groupIds)
    {
        $this->groups[$this->groupCpt++] = $groupIds;
    }

    public function getStepKey()
    {
        return $this->stepKey;
    }

    public function getResetKey()
    {
        return $this->resetKey;
    }


    public function reset()
    {
        $clean = [
            'steps' => [],
            'done' => [],
            'active' => null,
        ];

        $this->getPool()->setPool($clean);
        return $this;
    }

    /**
     * @param $id
     * @return array
     */
    public function getStepModel($id)
    {
        $this->init();
        if (array_key_exists($id, $this->stepInstances)) {
            /**
             * @var $step StepInterface
             */
            $step = $this->stepInstances[$id];
            $values = $this->getPool()->getPoolStepData($id);
            return $step->getModel($values);
        }
        $this->error("step not set with id $id");
    }

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
    public function getStepState($id)
    {
        $this->init();
        if (array_key_exists($id, $this->states)) {
            return $this->states[$id];
        }
        $this->error("Unknown step with id $id");
    }

    public function setActiveStep($id)
    {
        $this->getPool()->setPoolValue('active', $id);
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    public function setPool(PoolInterface $pool)
    {
        $this->pool = $pool;
        return $this;
    }

    public function debug() //override me
    {

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function error($msg)
    {
        throw new StepFormBuilderException($msg);
    }


    protected function onStepsCompletedAfter(array $allData) // override me
    {
    }

    protected function getPool()
    {
        if (null === $this->pool) {
            $this->pool = new SessionPool();
        }
        return $this->pool;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function init()
    {

        if (false === $this->initialized) {

            $this->initialized = true;
            $data = $_POST;


            $pool = $this->getPool()->getPool();


            $activeId = $pool['active'];


            if (null === $activeId) {
                $activeId = $this->getFirstStepId();
            }

            if (array_key_exists($this->resetKey, $data)) {
                $this->reset();
            }


            $dones = $pool['done'];
            $lastId = null;
            $userChosenId = null;

            if (array_key_exists($this->stepKey, $data)) {
                $userChosenId = $data[$this->stepKey];
            }

            foreach ($this->stepInstances as $id => $step) {


                if (
                    array_key_exists($id, $dones) &&
                    true === $dones[$id]
                ) {
                    $this->states[$id] = 'done';
                } else {
                    $this->states[$id] = 'inactive';
                }


                if (
                    null !== $userChosenId &&
                    $id === $userChosenId &&
                    array_key_exists($id, $dones) && true === $dones[$id]
                ) {
                    $activeId = $id;
                } else {
                    /**
                     * @var $step StepInterface
                     */
                    if ($step->isPosted()) {

                        if (array_key_exists($this->prevKey, $data)) { // prev step

                            if (null !== $lastId) {


                                $fId = $this->getFirstGroupElement($id);
                                $fLast = $this->getFirstGroupElement($lastId);

                                if (false !== $fLast && $fLast !== $fId) {
                                    $activeId = $fLast;
                                } else {
                                    $activeId = $lastId;
                                }

                            }
                        } else { // next step


                            $step->inject($data);


                            // if a form is posted, the step containing
                            // the form becomes active
                            $activeId = $id;


                            if (true === $step->isValid($data)) {


                                $data = $step->getData();

                                $this->getPool()->setPoolStepData($id, $data);
                                $this->getPool()->setPoolStepDone($id, true);

                                $nextStepId = $this->getNextStepId($id);

                                if (false === $nextStepId) {
                                    $this->onStepsCompletedAfter($this->getFlatPoolStepData());
                                } else {
                                    $activeId = $nextStepId;
                                }

                            }
                        }
                    }

                }
                $lastId = $id;
            }


            $this->states[$activeId] = 'active';
            $this->getPool()->setPoolValue('active', $activeId);

        }
    }

    private function getNextStepId($stepId)
    {
        $found = false;
        foreach ($this->stepInstances as $id => $step) {
            if (true === $found) {
                return $id;
            } else {
                if ($stepId === $id) {
                    $found = true;
                }
            }
        }
        return false;
    }


    private function getFirstStepId()
    {
        if ($this->stepInstances) {
            foreach ($this->stepInstances as $id => $instance) {
                return $id;
            }
        }
        throw new StepFormBuilderException("No steps defined");
    }


    /**
     * @param $id string, belonging to a group
     * @return false|string: id of the first step of the group.
     */
    private function getFirstGroupElement($id)
    {
        foreach ($this->groups as $group) {
            if (in_array($id, $group)) {
                reset($group);
                return current($group);
            }
        }
        return false;
    }

    private function getFlatPoolStepData()
    {
        $ret = [];
        $data = $this->getPool()->getPool();
        foreach ($data['steps'] as $id => $arr) {
            $ret = array_merge($ret, $arr);
        }
        return $ret;
    }

}