<?php


namespace Ling\Deploy\Helper;


/**
 * The Quoter class.
 */
class Quoter
{


    /**
     * Escape spaces for scp paths.
     * https://superuser.com/questions/1022976/scp-copy-has-error-ambiguous-target
     *
     *
     *
     * @param string $path
     * @return mixed
     */
    public static function scpEscapeSpace(string $path)
    {
        return str_replace(' ', '\\\\ ', $path);
    }

}