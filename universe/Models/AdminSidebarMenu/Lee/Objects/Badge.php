<?php


namespace Models\AdminSidebarMenu\Lee\Objects;


class Badge
{

    private $type;
    private $text;


    public function __construct()
    {

    }

    public static function create()
    {
        return new static();
    }

    /**
     * @return mixed
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

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }


    public function toArray(){
        return [
            'type' => $this->type,
            'text' => $this->text,
        ];
    }

}