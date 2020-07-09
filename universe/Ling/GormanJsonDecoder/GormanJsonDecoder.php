<?php


namespace Ling\GormanJsonDecoder;


/**
 * The GormanJsonDecoder class.
 */
class GormanJsonDecoder
{


    /**
     * Returns a prepared GormanEncodedData instance.
     *
     * @param array $arr
     * @param array $callbackKeys
     * @return GormanEncodedData
     */
    public static function encodeAsGormanData(array $arr, array $callbackKeys = []): GormanEncodedData
    {
        $data = new GormanEncodedData();
        $data->setPhpArray($arr);
        $data->setCallbackKeys($callbackKeys);
        return $data;
    }

    /**
     *
     * Returns a gorman array.
     * See the @page(GormanJsonDecoder conception notes) for more details.
     *
     * @param array $arr
     * @param array $callbackKeys
     * @return array
     */
    public static function encode(array $arr, array $callbackKeys = []): array
    {
        return [
            "gormanData" => $arr,
            "callbackKeys" => $callbackKeys,
        ];
    }


    /**
     * Returns the js code representing the given array.
     *
     * The given array can be either:
     *
     * - a regular php array, in which case the plain json_encode will be applied to it
     * - a gorman array, in which case the gorman encoding will be applied to it
     *
     *
     * See the @page(GormanJsonDecoder conception notes) for more details.
     *
     * @param array $array
     * @return string
     */
    public static function decode(array $array): string
    {
        if (array_key_exists('gormanData', $array)) {
            $gormanData = self::encodeAsGormanData($array['gormanData'], $array['callbackKeys']);
            return $gormanData->toJsCode();
        }
        return json_encode($array);
    }

}