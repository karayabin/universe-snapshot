<?php


namespace SafeUploader\Tool;


use Bat\FileSystemTool;
use Bat\SessionTool;
use Kamille\Services\XConfig;

class SafeUploaderHelperTool
{


    private static $key = "SafeUploader.uploads";

    public static function setTemporaryValue($profileId, array $realPaths, $tmpValue)
    {
        SessionTool::set(self::$key, []);
        $safeUploads = SessionTool::get(self::$key, []);
        $safeUploads[$profileId] = [$realPaths, $tmpValue];
        SessionTool::set(self::$key, $safeUploads);
    }


    public static function getTemporaryValues($profileId)
    {
        $safeUploads = SessionTool::get(self::$key, []);
        if (array_key_exists($profileId, $safeUploads)) {
            return $safeUploads[$profileId];
        }
        return false;
    }


    public static function fixTemporaryPaths($profileId, $replacement)
    {
        $profile = SafeUploaderHelperTool::getTemporaryValues($profileId);


        if (false !== $profile) {
            list($realPaths, $tmpValue) = $profile;

            foreach ($realPaths as $realPath) {
                if (file_exists($realPath)) {
                    $newPath = str_replace($tmpValue, $replacement, $realPath);
                    FileSystemTool::rename($realPath, $newPath);

                    /**
                     * We remove empty dirs, because this is just a move operation which
                     * the user is not supposed to be aware of.
                     */
                    $d = dirname($realPath);
                    FileSystemTool::cleanDirBubble($d);

                }
            }
        }
    }


    public static function getThumbPaths($origFile, $origDir, array $profile, array $payload)
    {
        $ret = [];
        $thumbSrc = $origFile;
        $isImage = $profile['isImage'];
        $thumbs = $profile['thumbs'];
        $orgFileName = $origFile;
        $orgBaseName = FileSystemTool::getFileName($origFile);
        $orgExtension = FileSystemTool::getFileExtension($origFile);

        if (true === $isImage) {
            foreach ($thumbs as $thumb) {
                $maxWidth = (array_key_exists("maxWidth", $thumb)) ? $thumb['maxWidth'] : null;
                $maxHeight = (array_key_exists("maxHeight", $thumb)) ? $thumb['maxHeight'] : null;
                $thumbDir = (array_key_exists("dir", $thumb)) ? $thumb['dir'] : null;
                $thumbName = (array_key_exists("name", $thumb)) ? $thumb['name'] : null;
                $preserveRatio = (array_key_exists("preserveRatio", $thumb)) ? (bool)$thumb['preserveRatio'] : true;

                $thumbPayload = $payload;
                $thumbPayload['dir'] = $origDir;
                $thumbPayload['maxHeight'] = (int)$maxHeight;
                $thumbPayload['maxWidth'] = (int)$maxWidth;
                $thumbPayload['fileName'] = $orgFileName;
                $thumbPayload['baseName'] = $orgBaseName;
                $thumbPayload['extension'] = $orgExtension;

                if (empty($thumbDir)) {
                    $thumbDir = $origDir;
                }
                if (null === $thumbName) {
                    $thumbName = "{baseName}-{maxWidth}x{maxHeight}.{extension}";
                }
                $thumbDir = self::replaceTags($thumbDir, $thumbPayload);
                $thumbName = self::replaceTags($thumbName, $thumbPayload);

                $thumbDst = $thumbDir . "/" . $thumbName;

                $ret[] = [
                    'src' => $thumbSrc,
                    'dst' => $thumbDst,
                    'dir' => $thumbDir,
                    'maxWidth' => $maxWidth,
                    'maxHeight' => $maxHeight,
                ];
            }
        }
        return $ret;
    }

    public static function replaceTags($string, array $tags)
    {
        foreach ($tags as $tag => $value) {
            $string = str_replace('{' . $tag . '}', $value, $string);
        }
        return $string;
    }


    public static function getConfigByFile($file)
    {
        $conf = [];
        if (file_exists($file)) {
            include $file;
        }
        return $conf;
    }
}