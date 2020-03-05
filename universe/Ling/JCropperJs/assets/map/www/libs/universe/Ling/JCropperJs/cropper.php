<?php


/**
 * Takes the given src image, and crops it to the given destination.
 * It returns null, or an error message if there was an error.
 *
 * The source is a file path.
 * The destination is a file path.
 * The data is an array with the following properties:
 *
 * - x: the offset left of the cropped area
 * - y: the offset top of the cropped area
 * - width: the width of the cropped area
 * - height: the height of the cropped area
 * - rotate: the rotated degrees of the image
 * - scaleX: the scaling factor to apply on the abscissa of the image
 * - scaleY: the scaling factor to apply on the ordinate of the image
 *
 * Note: if you are using cropperjs, you can get the data array by calling the getData method (https://github.com/fengyuanchen/cropperjs#getdatarounded).
 *
 *
 *
 *
 * @param string $src
 * @param string $dst
 * @param array $data
 * @return string|null
 */
function crop(string $src, string $dst, array $data): ?string
{
    $error = null;
    $src_type = exif_imagetype($src);


    $src_img = null;
    switch ($src_type) {
        case IMAGETYPE_GIF:
            $src_img = imagecreatefromgif($src);
            break;

        case IMAGETYPE_JPEG:
            $src_img = imagecreatefromjpeg($src);
            break;

        case IMAGETYPE_PNG:
            $src_img = imagecreatefrompng($src);
            break;
    }

    if (null !== $src_img) {


        $size = getimagesize($src);
        $size_w = $size[0]; // natural width
        $size_h = $size[1]; // natural height

        $src_img_w = $size_w;
        $src_img_h = $size_h;

        $degrees = $data['rotate'];

        // Rotate the source image
        if (is_numeric($degrees) && $degrees != 0) {
            // PHP's degrees is opposite to CSS's degrees
            $new_img = imagerotate($src_img, -$degrees, imagecolorallocatealpha($src_img, 0, 0, 0, 127));

            imagedestroy($src_img);
            $src_img = $new_img;

            $deg = abs($degrees) % 180;
            $arc = ($deg > 90 ? (180 - $deg) : $deg) * M_PI / 180;

            $src_img_w = $size_w * cos($arc) + $size_h * sin($arc);
            $src_img_h = $size_w * sin($arc) + $size_h * cos($arc);

            // Fix rotated image miss 1px issue when degrees < 0
            $src_img_w -= 1;
            $src_img_h -= 1;
        }

        $tmp_img_w = $data['width'];
        $tmp_img_h = $data['height'];

//        $dst_img_w = 220;
//        $dst_img_h = 220;

        $dst_img_w = $tmp_img_w;
        $dst_img_h = $tmp_img_h;


        $src_x = $data['x'];
        $src_y = $data['y'];

        if ($src_x <= -$tmp_img_w || $src_x > $src_img_w) {
            $src_x = $src_w = $dst_x = $dst_w = 0;
        } else if ($src_x <= 0) {
            $dst_x = -$src_x;
            $src_x = 0;
            $src_w = $dst_w = min($src_img_w, $tmp_img_w + $src_x);
        } else if ($src_x <= $src_img_w) {
            $dst_x = 0;
            $src_w = $dst_w = min($tmp_img_w, $src_img_w - $src_x);
        }

        if ($src_w <= 0 || $src_y <= -$tmp_img_h || $src_y > $src_img_h) {
            $src_y = $src_h = $dst_y = $dst_h = 0;
        } else if ($src_y <= 0) {
            $dst_y = -$src_y;
            $src_y = 0;
            $src_h = $dst_h = min($src_img_h, $tmp_img_h + $src_y);
        } else if ($src_y <= $src_img_h) {
            $dst_y = 0;
            $src_h = $dst_h = min($tmp_img_h, $src_img_h - $src_y);
        }

        // Scale to destination position and size
        $ratio = $tmp_img_w / $dst_img_w;
        $dst_x /= $ratio;
        $dst_y /= $ratio;
        $dst_w /= $ratio;
        $dst_h /= $ratio;

        $dst_img = imagecreatetruecolor($dst_img_w, $dst_img_h);

        // Add transparent background to destination image
        imagefill($dst_img, 0, 0, imagecolorallocatealpha($dst_img, 0, 0, 0, 127));
        imagesavealpha($dst_img, true);

        $result = imagecopyresampled($dst_img, $src_img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

        if ($result) {
            if (!imagepng($dst_img, $dst)) {
                $error = "Failed to save the cropped image file";
            }
        } else {
            $error = "Failed to crop the image file";
        }

        imagedestroy($src_img);
        imagedestroy($dst_img);
    } else {
        $error = "Failed to read the image file.";
    }

    return $error;
}

if (array_key_exists("data", $_POST)) {
    $data = $_POST['data'];
    crop("/komin/jin_site_demo/www/libs/cropperjs/picture.jpg", "/komin/jin_site_demo/www/libs/cropperjs/picture-cropped.jpg", $data);
}


