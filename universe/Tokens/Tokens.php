<?php


namespace Tokens;


/**
 * tools that apply to multiple tokens
 */
class Tokens
{


    public static function toFile(array $tokenIdentifiers, $file)
    {
        $content = '';
        foreach ($tokenIdentifiers as $tokenIdentifier) {
            if (is_string($tokenIdentifier)) {
                $content .= $tokenIdentifier;
            } else {
                $content .= $tokenIdentifier[1];
            }
        }
        return (false !== file_put_contents($file, $content));
    }


    public static function explicitTokenNames(array $tokenIdentifiers)
    {

        $ret = [];
        foreach ($tokenIdentifiers as $token) {
            if (is_array($token)) {
                $ret[] = [
                    token_name($token[0]),
                    $token[1],
                    $token[2],
                ];
            } else {
                $ret[] = $token;
            }
        }
        return $ret;
    }

    public static function concatenate(array $tokenIdentifiers)
    {
        $s = '';
        foreach ($tokenIdentifiers as $tokenIdentifier) {
            if (is_array($tokenIdentifier)) {
                $s .= $tokenIdentifier[1];
            } else {
                $s .= $tokenIdentifier;
            }
        }
        return trim($s);
    }


}