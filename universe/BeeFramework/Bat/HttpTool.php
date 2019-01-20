<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;


/**
 * HttpTool
 * @author Lingtalfi
 *
 *
 */
class HttpTool
{


    /**
     * Returns the http status code associated with an url.
     *
     * @param string $url The given url
     * @param int $timeout The number of seconds after each we should give up
     * @return bool false|string The status code
     */
    public static function getStatusCode($url, $timeout = 3)
    {
        if (in_array('curl', get_loaded_extensions())) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($curl);
            curl_close($curl);
            if (preg_match("/HTTP\/1\.[1|0]\s(\d{3})/", $data, $matches)) {
                return $matches[1];
            }
            return false;
        }
        throw new \RuntimeException("You must have the curl extension installed to use this method");
    }


    /**
     * http://stackoverflow.com/questions/2310558/how-to-delete-all-cookies-of-my-website-in-php
     */
    public static function deleteAllCookie()
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 1000);
                setcookie($name, '', time() - 1000, '/');
            }
        }
    }

    public static function resolveLiteralValue($value)
    {
        if (is_array($value)) {
            array_walk_recursive($value, function (&$v) {
                $v = self::resolveLiteralValue($v);
            });
            return $value;
        }
        else {
            if (null === $value) {
                return null;
            }
            if (strlen($value) === 0) {
                /**
                 * empty values are not the same as null.
                 * If you try to insert data in a mysql database for instance,
                 * mysql will refuse to insert null values in fields that don't accept null values.
                 */
                return '';
            }
            $originalValue = $value;
            $value = trim($value);

            //------------------------------------------------------------------------------/
            // TESTING SCALAR SPECIAL
            //------------------------------------------------------------------------------/
            $lstring = strtolower($value);

            if ('true' === $lstring) {
                return true;
            }
            elseif ('false' === $lstring) {
                return false;
            }
            elseif (is_numeric($value)) {
                if (false !== strpos($value, '.')) {
                    return (float)$value;
                }
                else {
                    return (int)$value;
                }
            }
            elseif ('null' === $lstring) {
                return null;
            }
            return $originalValue;
        }
    }
}
