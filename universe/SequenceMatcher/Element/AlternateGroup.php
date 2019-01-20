<?php


namespace SequenceMatcher\Element;


class AlternateGroup implements AlternateGroupInterface
{

    private $alternates;


    public function __construct()
    {
        $this->alternates = [];
    }


    public static function create()
    {
        return new self();
    }

    public function addAlternative(GroupInterface $group, $modificator = null, $marker = null)
    {
        $this->alternates[] = [$group, $modificator, $marker];
        return $this;
    }

    /**
     * @return GroupInterface[]
     */
    public function getAlternatives()
    {
        return $this->alternates;
    }


}