<?php


namespace Ling\Light_UserData\Helper;


use Ling\Bat\FileSystemTool;
use Ling\Light_UserData\Exception\LightUserDataException;

/**
 * The LightUserDataHelper class.
 */
class LightUserDataHelper
{
    /**
     * Returns the path to the original (image) of the given path.
     * See more about the @page(original image concept in our conception notes).
     *
     * The given path must be absolute.
     *
     *
     * @param string $path
     * @return string
     */
    public static function getOriginalPath(string $path): string
    {
        $oriDir = dirname($path);
        $oriBasename = FileSystemTool::getBasename($path);
        $oriExt = FileSystemTool::getFileExtension($path);
        if (false === empty($oriExt)) {
            $oriExt = "." . $oriExt;
        }
        return $oriDir . "/" . $oriBasename . "--ORIGINAL" . $oriExt;
    }


    /**
     * Returns the components of the resourceIdentifier.
     *
     * It's an array containing:
     * - 0: the user id
     * - 1: the canonical name
     *
     * See more details in the @page(Light_UserData conception notes).
     *
     * @param string $resourceIdentifier
     * @return array
     * @throws \Exception
     */
    public static function extractResourceIdentifier(string $resourceIdentifier): array
    {
        $p = explode('-', $resourceIdentifier, 2);
        if (2 === count($p)) {
            return $p;
        }
        throw new LightUserDataException("Invalid resource identifier: $resourceIdentifier");
    }

    /**
     * Returns the resource identifier based on the given userId and canonical name of the resource.
     *
     * @param int $userId
     * @param string $canonical
     * @return string
     */
    public static function implodeResourceIdentifier(int $userId, string $canonical): string
    {
        return $userId . "-" . $canonical;
    }
}