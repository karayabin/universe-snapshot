<?php


namespace Ling\Panda_Headers;


use Ling\Light\Http\HttpResponseInterface;

/**
 * The Panda_Headers_Tool class.
 */
class Panda_Headers_Tool
{

    /**
     * Adds @page(panda headers) to the http response.
     *
     * @param array $headers
     */
    public static function addHeaders(array $headers)
    {
        self::addOrAttachHeaders($headers);
    }


    /**
     * Attaches @page(panda headers) to the given http response.
     *
     * @param array $headers
     * @param HttpResponseInterface $response
     */
    public static function attachHeaders(array $headers, HttpResponseInterface $response)
    {
        self::addOrAttachHeaders($headers, $response);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Adds or attaches @page(panda headers) to the http response.
     *
     * @param array $headers
     * @param HttpResponseInterface|null $response
     */
    private static function addOrAttachHeaders(array $headers, HttpResponseInterface $response = null)
    {
        $arrays = [];
        foreach ($headers as $name => $value) {
            if (true === is_array($value)) {
                foreach ($value as $v) {
                    if (false !== strpos($v, ',')) {
                        if (null !== $v) {
                            $v = self::escapeCommas($v);
                        }
                    }
                    if (null !== $response) {
                        $response->setHeader("panda_$name", $v, false);
                    } else {
                        header("panda_$name: $v", false);
                    }
                }
                $arrays[] = $name;
            } else {
                if (null !== $value) {
                    $value = self::escapeCommas($value);
                }
                if (null !== $response) {
                    $response->setHeader("panda_$name", $value);
                } else {
                    header("panda_$name: $value");
                }
            }
        }
        if ($arrays) {
            if (null !== $response) {
                $response->setHeader("panda__arrays", implode(",", $arrays));
            } else {
                header("panda__arrays: " . implode(",", $arrays));
            }
        }
    }


    /**
     * Transforms the commas in the given string into __panda_comma__, and returns the transformed string.
     * @param string $string
     * @return string
     */
    private static function escapeCommas(string $string): string
    {
        return str_replace(',', '__panda_comma__', $string);
    }
}