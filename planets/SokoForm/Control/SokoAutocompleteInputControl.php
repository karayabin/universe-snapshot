<?php


namespace SokoForm\Control;


class SokoAutocompleteInputControl extends SokoInputControl
{

    protected $autocompleteOptions;


    public function __construct()
    {
        parent::__construct();
        $this->autocompleteOptions = [
            /**
             * This class is plugin agnostic, so you could use jquery ui autocomplete for instance,
             * http://api.jqueryui.com/autocomplete/
             *
             * or any other system.
             *
             */
            "source" => "/service.php",
        ];

    }

    public function setAutocompleteOptions(array $autocompleteOptions)
    {
        $this->autocompleteOptions = $autocompleteOptions;
        return $this;
    }

    /**
     * @return array
     */
    public function getAutocompleteOptions()
    {
        return $this->autocompleteOptions;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getSpecificModel() // override me
    {
        $model = parent::getSpecificModel();
        $model['autocomplete'] = true;
        $model['autocompleteOptions'] = $this->autocompleteOptions;
        return $model;
    }


}