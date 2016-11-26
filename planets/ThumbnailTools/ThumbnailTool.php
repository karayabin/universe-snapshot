<?php

namespace ThumbnailTools;

/*
 * LingTalfi 2016-01-06
 */
use Bat\FileSystemTool;

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
     *
     * maxWidth and maxHeight must be strictly positive integers.
     *
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
     * @return bool
     */
    public static function biggest($src, $dst, $maxWidth = null, $maxHeight = null)
    {
        list($srcWidth, $srcHeight, $srcType) = getimagesize($src);

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
        }
        elseif (0 !== $maxHeight && 0 === $maxWidth) {
            $height = $maxHeight;
            $width = $height * $ratio;
        }
        elseif (0 !== $maxWidth && 0 !== $maxHeight) {
            // taller
            if ($height > $maxHeight) {
                $width = ($maxHeight / $height) * $width;
                $height = $maxHeight;
            }

            // wider
            if ($width > $maxWidth) {
                $height = ($maxWidth / $width) * $height;
                $width = $maxWidth;
            }
        }


        $imageFinal = imagecreatetruecolor($width, $height);


        switch ($srcType) {
            case IMAGETYPE_JPEG:
            case IMAGETYPE_JPEG2000:
                $image = imagecreatefromjpeg($src);
                break;
            case IMAGETYPE_PNG:

                $image = imagecreatefrompng($src);
                imagealphablending($imageFinal, false);
                imagesavealpha($imageFinal, true);
                $transparent = imagecolorallocatealpha($imageFinal, 255, 255, 255, 127);
                imagefilledrectangle($imageFinal, 0, 0, $width, $height, $transparent);

                break;
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($src);

                $transparent_index = imagecolortransparent($image);
                if ($transparent_index >= 0) {
                    imagepalettecopy($image, $imageFinal);
                    imagefill($imageFinal, 0, 0, $transparent_index);
                    imagecolortransparent($imageFinal, $transparent_index);
                    imagetruecolortopalette($imageFinal, true, 256);
                }
                break;
            default:
                throw new \RuntimeException("Unsupported image format: $srcType");
                break;
        }


        imagecopyresampled($imageFinal, $image, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);


        // assuming the file has an explicit extension (otherwise accept an array as argument...)
        $ext = strtolower(FileSystemTool::getFileExtension($dst));

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
        }
        else {
            $dst_parent = dirname($dst);
            trigger_error("Couldn't create the target directory $dst_parent", E_USER_WARNING);
        }
        return $res;
    }


}
