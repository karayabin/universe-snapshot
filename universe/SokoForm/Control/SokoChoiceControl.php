<?php


namespace SokoForm\Control;


class SokoChoiceControl extends SokoControl
{

    protected $choices;
    protected $createIndividualNames;


    public function __construct()
    {
        parent::__construct();
        $this->choices = [];
        $this->createIndividualNames = false;
    }

    /**
     * @return array
     */
    public function getChoices()
    {
        return $this->choices;
    }

    public function setChoices($choices, $createIndividualNames = false)
    {
        $this->choices = $choices;
        $this->createIndividualNames = $createIndividualNames;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getSpecificModel() // override me
    {
        $choices = [];
        if (false === $this->createIndividualNames) {
            $choices = $this->choices;
            if ($this->choices) {
                $current = current($this->choices);
                if (is_array($current)) {
                    $type = "listGroup";

                } else {
                    $type = "list";
                }
            } else {
                $type = "list";
            }
        } else {
            $type = "listWithNames";
            foreach ($this->choices as $value => $label) {
                $name = $this->name . "[$value]";
                $choices[] = [$name, $value, $label, $this->name];
            }
        }

        $ret = [
            "type" => $type, // list | listGroup | listWithNames
            "choices" => $choices,
        ];
        return $ret;
    }


}