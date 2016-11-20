<?php

namespace Colis\InfoHandler;

/*
 * LingTalfi 2016-01-11
 */
interface InfoHandlerInterface
{

    /**
     * @param $name , string, the name of the item; can possibly be an external url
     * @param $err , string, leave it alone if there is no error
     * @return array|false, the info array, which allows to display the item preview.
     *
     *
     *      By convention, the returned array should at least contain a "type" key.
     *
     */
    public function getInfo($name, &$err);
}
