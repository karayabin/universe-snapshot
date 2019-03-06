<?php


namespace Ling\FormModel\Group;



interface GroupInterface
{
    public function getLabel();

    /**
     * @return array of item.
     * Each item is the following:
     *          [id, object]
     *
     * object is either a ControlInterface or a GroupInterface
     *
     *
     */
    public function getChildren();

}