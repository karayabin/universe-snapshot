<?php

namespace MyAppTools\User;

/*
 * LingTalfi 2015-12-15
 */
class DbUser extends User
{


    /**
     * @return string|false, the user id, or false if not set.
     */
    public function getId()
    {
        return $this->getOr('id', false);
    }


}
