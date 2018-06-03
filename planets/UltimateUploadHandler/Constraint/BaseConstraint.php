<?php


namespace UltimateUploadHandler\Constraint;


abstract class BaseConstraint implements ConstraintInterface
{

    protected $messages;

    public function __construct()
    {
        $this->messages = [];
    }


    public static function create()
    {
        return new static();
    }

    public function setMessages(array $messages)
    {
        $this->messages = $messages;
        return $this;
    }
}