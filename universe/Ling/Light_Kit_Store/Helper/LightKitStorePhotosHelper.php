<?php


namespace Ling\Light_Kit_Store\Helper;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Bat\ImageTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Store\Exception\LightKitStoreException;

/**
 * The LightKitStorePhotosHelper class.
 */
class LightKitStorePhotosHelper
{


    /**
     * Returns the first item of type photo from the given screenshots array, or null if no such item was found.
     *
     * @param array $screenshots
     * @return array|null
     */
    public static function getFirstPhotoByItem(array $screenshots): array|null
    {
        foreach ($screenshots as $screenshot) {
            if ('photo' === $screenshot['type']) {
                return $screenshot;
            }
        }
        return null;
    }


    /**
     * Returns an array of @page(smart screenshots) from the given database raw screenshots string.
     * Available options are:
     * - imageSizes: bool=false. If true, the screenshots array items are augmented with the following properties for type=photo:
     *      - largeWidth: width of the large image in pixel, or 0 if the file is not found
     *      - largeHeight: height of the large image in pixel, or 0 if the file is not found
     * - container: a LightServiceContainerInterface instance, or null. Required only if you use the imageSizes option.
     *
     *
     * @param string $screenshots
     * @return array
     * @throws \Exception
     */
    public static function toSmartScreenshots(string $screenshots, array $options = []): array{

        $imageSizes = $options['imageSizes'] ?? false;
        $container = $options['container'] ?? null;
        $appDir = "undefined";

        if($container instanceof LightServiceContainerInterface){
            $appDir = $container->getApplicationDir();
        }


        $screenshots = BabyYamlUtil::readBabyYamlString($screenshots);
        $items = [];
        foreach ($screenshots as $screenshot) {

            $item = [];

            $type = "photo";
            $subType = null;
            if (true === str_starts_with($screenshot, 'yt:')) {
                $type = "video/youtube";

            }


            $ext = strtolower(FileSystemTool::getFileExtension($screenshot));
            if ('mp4' === $ext) {
                $type = "video/mp4";
            }


            $item["type"] = $type;

            if ('photo' === $type) {
                $item["url"] = $screenshot;
                $item['thumb'] = str_replace('/medium/', "/thumb/", $screenshot);
                $item['large'] = str_replace('/medium/', "/large/", $screenshot);

                if (true === $imageSizes) {


                    $f = $appDir . "/www" . $item['large'];
                    $width = 0;
                    $height = 0;
                    if (true === file_exists($f)) {
                        list($width, $height) = ImageTool::getDimensions($f);
                    }

                    $item['largeWidth'] = $width;
                    $item['largeHeight'] = $height;
                }

            } elseif ('video/mp4' === $type) {
                $item["url"] = $screenshot;
                $thumb = str_replace('/video/', "/thumb/", $screenshot);
                $thumb = substr($thumb, 0, -4) . ".jpg";
                $poster = str_replace('/thumb/', "/poster/", $thumb);

                $item['thumb'] = $thumb;
                $item['poster'] = $poster;
            } elseif ('video/youtube' === $type) {
                $p = explode(":", $screenshot, 2);
                $videoId = trim(array_pop($p));
                $item['videoId'] = $videoId;
            } else {
                throw new LightKitStoreException("Unknown visual element type: $type.");
            }


            $items[] = $item;
        }
        return $items;
    }
}