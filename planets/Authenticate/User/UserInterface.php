<?php


namespace Authenticate\User;


/**
 * All returned info are strings, except maybe some extra info which are accessed via the get method.
 */
interface UserInterface
{


    public function id();

    public function profile();

    public function name();

    public function pass();

    public function get($key, $default = null);

    /**
     * @return array, all extra information about the user
     */
    public function all();
}