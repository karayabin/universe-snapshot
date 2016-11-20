<?php

namespace YouTubeUtils;

/*
 * LingTalfi 2016-01-09
 */
class YouTubeTool
{


    /**
     * Return the video id associated with the url, or false if
     * the given url was not recognized as a youtube video.
     *
     *
     * @param $url
     *
     * @return false|string
     *
     * Note: stolen from there https://github.com/lingtalfi/video-ids-and-thumbnails/blob/master/function.video.php#L41
     *
     */
    public static function getId($url)
    {
        $parts = parse_url($url);
        if (isset($parts['host'])) {
            $host = $parts['host'];
            if (
                false === strpos($host, 'youtube') &&
                false === strpos($host, 'youtu.be')
            ) {
                return false;
            }
        }
        if (isset($parts['query'])) {
            parse_str($parts['query'], $qs);
            if (isset($qs['v'])) {
                return $qs['v'];
            }
            else if (isset($qs['vi'])) {
                return $qs['vi'];
            }
        }
        if (isset($parts['path'])) {
            $path = explode('/', trim($parts['path'], '/'));
            return $path[count($path) - 1];
        }
        return false;
    }
}
