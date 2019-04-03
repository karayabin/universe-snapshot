<?php

namespace Ling\EasyConsoleMenu\History;


/**
 * The StepsHistory interface.
 *
 */
class StepsHistory implements HistoryInterface
{


    /**
     * This property holds the steps names for this instance.
     * @var array
     */
    protected $steps;


    /**
     * Builds the StepsHistory instance.
     */
    public function __construct()
    {
        $this->steps = [];
    }

    /**
     * @implementation
     */
    public function pop()
    {
        if ($this->steps) {
            return array_pop($this->steps);
        }
        return false;
    }

    /**
     * @implementation
     */
    public function add(string $stepName)
    {
        $this->steps[] = $stepName;
    }


    /**
     * @implementation
     */
    public function last()
    {
        if ($this->steps) {
            $steps = $this->steps;
            return array_pop($steps);
        }
        return false;
    }


    /**
     * @implementation
     */
    public function first()
    {
        if ($this->steps) {
            $steps = $this->steps;
            return array_shift($steps);
        }
        return false;
    }


    /**
     * @implementation
     */
    public function count(): int
    {
        return count($this->steps);
    }


    /**
     * @implementation
     */
    public function clear()
    {
        return $this->steps = [];
    }


    /**
     * @implementation
     */
    public function all(): array
    {
        return $this->steps;
    }


    /**
     * @implementation
     */
    public function has(string $stepName): bool
    {
        return in_array($stepName, $this->steps, true);
    }


    /**
     * @implementation
     */
    public function popUntil(string $stepName): bool
    {
        $hasStep = self::has($stepName);
        if (true === $hasStep) {
            $n = self::count();
            for ($i = 0; $i < $n; $i++) {
                $currentStep = array_pop($this->steps);
                if ($stepName === $currentStep) {
                    break;
                }
            }
        }
        return $hasStep;
    }


}