<?php


namespace SokoForm\Control;


/**
 * The idea is to display a form control with two sides:
 * one on the left and one on the right.
 *
 * Both sides contain one unfolded (multiple) list,
 * with a button underneath each list to pass items from one side to the other.
 * Each list can be capped by a title.
 *
 */
class SokoTennisListChoiceControl extends SokoChoiceControl
{

    protected $selectedKeys;
    protected $allSelectedReturnsNull;


    public function __construct()
    {
        parent::__construct();
        $this->selectedKeys = [];
        $this->allSelectedReturnsNull = true;
    }


    public function setValue($value)
    {
        $this->selectedKeys = $value;
        return $this;
    }

    public function setAllSelectedReturnsNull(bool $allSelectedReturnsNull)
    {
        $this->allSelectedReturnsNull = $allSelectedReturnsNull;
        return $this;
    }


    public function getValue()
    {
        if (true === $this->allSelectedReturnsNull) {

            $initialCount = count($this->choices);
            $count = count($this->selectedKeys);
            if ($count === $initialCount) {
                return null;
            }
        }
        return $this->selectedKeys;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getSpecificModel() // override me
    {
        $selected = $this->selectedKeys;
        if (null === $selected) {
            $selected = array_keys($this->choices);
        }
        if ($selected) {
            $selected = array_map('strval', $selected);
        }

        $ret = [
            "type" => "list",
            "choices" => $this->choices,
            "selectedKeys" => $selected,
        ];
        return $ret;
    }


}