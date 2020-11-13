<?php


namespace Ling\SimplePdoWrapper\Util;

/**
 * The SimplePdoSpecialExpressionHelper class.
 */
class SimplePdoSpecialExpressionHelper
{

    /**
     * The separator to use with group_concat function.
     */
    public const GROUP_CONCAT_SEPARATOR = '__GCS__';


    /**
     * Returns the unserialized version of the given serialized string.
     *
     * @param string|null $serialized
     * @return array
     */
    public static function unserializeGroupConcatSeparator(?string $serialized): array
    {
        if (null === $serialized) {
            return [];
        }
        return explode(self::GROUP_CONCAT_SEPARATOR, $serialized);
    }
}