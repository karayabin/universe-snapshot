<?php


namespace SokoForm\Control;


class SokoFileControl extends SokoControl
{

    protected $accept;
    protected $type;


    public function __construct()
    {
        parent::__construct();
        $this->accept = null;
        $this->type = 'static';
    }

    public function setAccept($accept)
    {
        $this->accept = $accept;
        return $this;
    }

    /**
     * @return string (static|ajax|...one of your own)
     */
    public function getType()
    {
        return $this->type;
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
            /**
             * same as html accept attribute
             */
            "accept" => $this->accept,
            "type" => $this->type,
        ];
    }


}