<?php

namespace Ling\ThumbnailTools;

/*
 * LingTalfi 2016-01-06
 */

use Ling\Bat\FileSystemTool;

class ThumbnailTool
{


    /**
     *
     * Create the biggest thumbnail possible given the maxWidth and maxHeight.
     *
     * Ratio is always preserved.
     * The destination directory is created if necessary.
     * The function ensures that an image is created (handy to use with uploaded files for security).
     *
     *
     * If maxWidth is null and maxHeight is null, the created image will have the same dimensions
     * as the original image.
     *
     * If maxWidth is set and maxHeight is null, then the created image's width will be maxWidth, and the image's height will
     * be the natural height that maintain the ratio.
     *
     * Conversely, if maxHeight is set and maxWidth is null, then the created image's height will be maxHeight, and the image's width will
     * be the natural width that maintain the ratio.
     *
     * If both maxWidth and maxHeight are set, then the created image will have dimensions so that it honors both limitations,
     * and in accordance with the image original ratio.
     *
     *
     * The image is scaled up if necessary.
     *
     * maxWidth and maxHeight must be strictly positive integers.
     *
     *
     *
     * The available options are:
     * - extension: forces the extension of the file to create.
     *              By default, the extension is taken from the dst file,
     *              but you can override it with this option.
     *
     *
     *
     *
     *
     * Notes:
     * Tested transparency of gif and png successfully using
     *      gif to gif
     *      and
     *      png to png
     *
     * With (from phpinfo):
     * - imac 10.11.1
     * - php: 5.6.12
     * - gdVersion: bundled (2.1.0 compatible)
     *
     *
     *
     *
     *
     * @param $src
     * @param $dst
     * @param int $maxWidth
     * @param int $maxHeight
     * @param array $options
     * @return bool
     */
    public static function biggest($src, $dst, $maxWidth = null, $maxHeight = null, array $options = [])
    {

        $forcedExtension = $options['extension'] ?? null;

        list($srcWidth, $srcHeight, $srcType) = getimagesize($src);
        if (0 !== (int)$srcHeight) {


            //------------------------------------------------------------------------------/
            // Compute height and width
            //------------------------------------------------------------------------------/
            $ratio = $srcWidth / $srcHeight;
            $width = $srcWidth;
            $height = $srcHeight;
            $maxWidth = (int)$maxWidth;
            $maxHeight = (int)$maxHeight;
            $res = false;

            if (0 !== $maxWidth && 0 === $maxHeight) {
                $width = $maxWidth;
                $height = $width / $ratio;
            } elseif (0 !== $maxHeight && 0 === $maxWidth) {
                $height = $maxHeight;
                $width = $height * $ratio;
            } elseif (0 !== $maxWidth && 0 !== $maxHeight) {
                $width = $maxWidth;
                $height = $maxHeight;

                if ($ratio >= 1) {
                    $height = $width / $ratio;
                } else {
                    $width = $height * $ratio;
                }
            }


            $imageFinal = imagecreatetruecolor($width, $height);


            $type2Handlers = static::getType2Handlers();
            $handler = (array_key_exists($srcType, $type2Handlers)) ? $type2Handlers[$srcType] : "none";


            switch ($handler) {
                case "jpg":
                    $image = imagecreatefromjpeg($src);
                    break;
                case "gif":

                    $image = imagecreatefromgif($src);
                    imagealphablending($imageFinal, false);
                    imagesavealpha($imageFinal, true);
                    $transparent = imagecolorallocatealpha($imageFinal, 255, 255, 255, 127);
                    imagefilledrectangle($imageFinal, 0, 0, $width, $height, $transparent);

                    break;
                case "png":
                    $image = imagecreatefrompng($src);

                    $transparent_index = imagecolortransparent($image);
                    if ($transparent_index >= 0) {
                        imagepalettecopy($image, $imageFinal);
                        imagefill($imageFinal, 0, 0, $transparent_index);
                        imagecolortransparent($imageFinal, $transparent_index);
                        imagetruecolortopalette($imageFinal, true, 256);
                    }
                    break;
                default:
                    throw new \RuntimeException("Unsupported image format: $srcType, src: $src");
                    break;
            }


            imagecopyresampled($imageFinal, $image, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);


            if (null === $forcedExtension) {
                // assuming the file has an explicit extension (otherwise accept an array as argument...)
                $ext = strtolower(FileSystemTool::getFileExtension($dst));
                if (empty($ext)) {
                    $ext = strtolower(FileSystemTool::getFileExtension($src));
                }
            } else {
                $ext = $forcedExtension;
            }


            if (true === FileSystemTool::mkdir(dirname($dst), 0777, true)) {


                switch ($ext) {
                    case 'jpeg':
                    case 'jpg':
                        $res = imagejpeg($imageFinal, $dst);
                        break;
                    case 'png':
                        $res = imagepng($imageFinal, $dst);
                        break;
                    case 'gif':
                        $res = imagegif($imageFinal, $dst);
                        break;
                    default:
                        throw new \RuntimeException("Unsupported destination image extension: $ext");
                        break;
                }
                imagedestroy($imageFinal);
                imagedestroy($image);
            } else {
                $dst_parent = dirname($dst);
                trigger_error("Couldn't create the target directory $dst_parent", E_USER_WARNING);
            }
            return $res;
        }
        return false;
    }


    protected static function getType2Handlers()
    {
        return [
            IMAGETYPE_JPEG => 'jpg',
            IMAGETYPE_JPEG2000 => 'jpg',
            IMAGETYPE_GIF => 'gif',
            IMAGETYPE_PNG => 'png',
        ];
    }

}
