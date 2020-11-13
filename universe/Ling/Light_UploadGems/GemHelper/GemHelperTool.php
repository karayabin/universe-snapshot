<?php


namespace Ling\Light_UploadGems\GemHelper;


use Ling\Bat\MimeTypeTool;
use Ling\Bat\SmartCodeTool;
use Ling\Light_UploadGems\Exception\LightUploadGemsException;
use Ling\ThumbnailTools\ThumbnailTool;

/**
 * The GemHelperTool class.
 */
class GemHelperTool
{
    /**
     * Parses the given transformer string, and returns an info array with the following structure:
     *
     * - 0: transformer id (the function name)
     * - 1: array of parameters
     *
     *
     * @param string $transformer
     * @return array
     * @throws \Exception
     *
     */
    public static function extractFunctionInfo(string $transformer): array
    {
        $p = explode('(', $transformer, 2);
        $transformerId = trim($p[0]);
        $transformerParams = [];
        if (2 === count($p)) {
            $transformerStringParams = trim($p[1], ') ');
            $transformerParams = SmartCodeTool::parse('[' . $transformerStringParams . ']');
        }
        return [
            $transformerId,
            $transformerParams,
        ];
    }


    /**
     * Transforms the srcPath image according to the given imageTransformer, and stores it in dstPath.
     * Returns whether the creation of the copy was successful.
     *
     * In case of errors throws exceptions.
     *
     *
     * @param string $srcPath
     * The path to a supposedly valid image.
     *
     * @param string $dstPath
     * @param string $imageTransformer
     *
     * @return bool
     * @throws \Exception
     */
    public static function transformImage(string $srcPath, string $dstPath, string $imageTransformer): bool
    {
        list($transformerId, $transformerParams) = GemHelperTool::extractFunctionInfo($imageTransformer);
        switch ($transformerId) {
            case "resize":
                $width = $transformerParams[0] ?? null;
                $height = $transformerParams[0] ?? null;


                $type = MimeTypeTool::getMimeType($srcPath);
                $extension = substr($type, 6); // strip image/ from the mime type

                $options = [
                    "extension" => $extension,
                ];
                if (true === ThumbnailTool::biggest($srcPath, $dstPath, $width, $height, $options)) {
                    return true;
                } else {
                    $filename = basename($srcPath);
                    throw new LightUploadGemsException("ThumbnailTool error: couldn't resize the image (filename=\"$filename\").");
                }
                break;
            default:
                $filename = basename($srcPath);
                throw new LightUploadGemsException("Bad configuration error: the imageTransformer function $transformerId is not recognized yet (file name=\"$filename\").");
                break;
        }
        return false;
    }
}