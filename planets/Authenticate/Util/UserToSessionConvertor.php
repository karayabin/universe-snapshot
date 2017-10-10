<?php


namespace Authenticate\Util;


use Authenticate\User\UserInterface;

class UserToSessionConvertor
{

    public static function toSession(UserInterface $user, array $filter = null)
    {

        $ret = $user->all();
        if(is_array($filter)){
            foreach($filter as $fil){
                if(array_key_exists($fil, $ret)){
                    unset($ret[$fil]);
                }
            }
        }
        return $ret;
    }

}