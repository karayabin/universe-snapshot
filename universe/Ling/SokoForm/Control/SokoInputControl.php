<?php


namespace Ling\SokoForm\Control;


class SokoInputControl extends SokoControl
{

    protected $placeholder;

    /**
     * string:
     * - text
     * - textarea
     * - hidden
     * - password
     * - ...you own types
     *
     * Note: there is no direct relation to the html type (although the names
     * look alike), see the documentation for more information about the
     * significance of the InputControl type property.
     *
     */
    protected $type;

    public function __construct()
    {
        parent::__construct();
        $this->placeholder = null;
        $this->type = 'text';
    }

    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getSpecificModel() // override me
    {
        return [
            'placeholder' => $this->placeholder,
            'type' => $this->type,
        ];
    }

}