<?php


namespace Ling\SokoForm\Control;


/**
 *
 * Based on jqueryUi comboBox
 * https://jqueryui.com/autocomplete/#combobox
 *
 *
 * It works only with simple maps (arrays of key => value)
 *
 *
 * This class will be able to accept a list of options,
 * or work with ajax loaded options.
 *
 */
class SokoComboBoxControl extends SokoControl
{

    protected $choices;
    protected $addEmptyChoice;

    public function __construct()
    {
        parent::__construct();
        $this->choices = [];
    }

    public function setChoices(array $choices)
    {
        $this->choices = $choices;
        return $this;
    }


    public function getChoices()
    {
        return $this->choices;
    }


    public function addEmptyChoiceAtBeginning($bool = true)
    {
        $this->addEmptyChoice = $bool;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getSpecificModel() // override me
    {
        $choices = $this->choices;
        if (true === $this->addEmptyChoice) {
            $tmp = [
                "" => "Select an element", // this should be overridden anyway (i.e. not visible)
            ];
            foreach ($choices as $k => $v) {
                $tmp[$k] = $v;
            }
            $choices = $tmp;
        }

        $ret = [
            "type" => 'list',
            "choices" => $choices,
        ];
        return $ret;
    }

}