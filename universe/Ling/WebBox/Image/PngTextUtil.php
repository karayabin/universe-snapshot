<?php


namespace Ling\WebBox\Image;


use Ling\Bat\ConvertTool;
use Ling\WebBox\Exception\WebBoxException;

/**
 * The PngTextUtil class.
 */
class PngTextUtil
{


    /**
     * Displays a png text.
     *
     * Note: this method is meant to be used as a webservice.
     *
     * Options:
     * ------------
     * - **font**: string = arial/Arial.ttf
     *          The font to use.
     *          If the path starts with a slash, it's an absolute path to the font file.
     *          Else if the path doesn't start with a slash, it's a relative path to the font directory provided
     *          by this class (the WebBox/assets/fonts directory in this repository).
     * - **fontSize**: int = 12
     *          The font size.
     * - **color**: string = 000000
     *          The color of the text in hexadecimal format (6 chars).
     *          This can optionally be prefixed with a pound symbol (#).
     *
     *
     *
     *
     *
     *
     * @param string $text
     * @param array $options
     * @throws \Bat\Exception\BatException
     * @throws WebBoxException
     */
    public static function displayPngText(string $text, array $options = []): void
    {

        if (false === extension_loaded("gd")) {
            throw new WebBoxException("The gd extension is not loaded!");
        }

        header("Content-type: image/png");

        $font = $options['font'] ?? "arial/Arial.ttf";
        $fontsize = $options['fontSize'] ?? 12;
        $hexColor = $options['color'] ?? "000000";


        if ('/' !== substr($font, 0, 1)) {
            $fontDir = __DIR__ . "/../assets/fonts";
            $font = $fontDir . "/" . $font;
        }


        $rgbColors = ConvertTool::convertHexColorToRgb($hexColor);


        //--------------------------------------------
        // GET THE TEXT BOX DIMENSIONS
        //--------------------------------------------
        $charWidth = $fontsize;
        $charFactor = 1;
        $textLen = mb_strlen($text);
        $imageWidth = $textLen * $charWidth * $charFactor;
        $imageHeight = $fontsize;
        $logoimg = imagecreatetruecolor($imageWidth, $imageHeight);
        imagealphablending($logoimg, false);
        imagesavealpha($logoimg, true);
        $col = imagecolorallocatealpha($logoimg, 255, 255, 255, 127);
        imagefill($logoimg, 0, 0, $col);
        $white = imagecolorallocate($logoimg, $rgbColors[0], $rgbColors[1], $rgbColors[2]); //for font color
        $x = 0;
        $y = $fontsize;
        $angle = 0;
        $bbox = imagettftext($logoimg, $fontsize, $angle, $x, $y, $white, $font, $text); //fill text in your image
        $boxWidth = $bbox[4] - $bbox[0];
        $boxHeight = $bbox[7] - $bbox[1];
        imagedestroy($logoimg);


        //--------------------------------------------
        // CREATE THE PNG
        //--------------------------------------------
        $imageWidth = abs($boxWidth);
        $imageHeight = abs($boxHeight);
        $logoimg = imagecreatetruecolor($imageWidth, $imageHeight);
        imagealphablending($logoimg, false);
        imagesavealpha($logoimg, true);
        $col = imagecolorallocatealpha($logoimg, 255, 255, 255, 127);
        imagefill($logoimg, 0, 0, $col);
        $white = imagecolorallocate($logoimg, $rgbColors[0], $rgbColors[1], $rgbColors[2]); //for font color
        $x = 0;
        $y = $fontsize;
        $angle = 0;
        imagettftext($logoimg, $fontsize, $angle, $x, $y, $white, $font, $text); //fill text in your image


        imagepng($logoimg); //save your image at new location $target
        imagedestroy($logoimg);
    }

}


