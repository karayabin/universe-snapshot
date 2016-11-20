<?php

namespace Ffmpeg;

/*
 * LingTalfi 2016-04-04
 */
class Ffmpeg
{


    public static $ffmpegPaths = ['/opt/local/bin/ffmpeg', "/usr/bin/ffmpeg"];
    public static $ffmpegPath = null;

    public static function getDurationInSeconds(string $file, string $ffmpegPath = null): int
    {
        $duration = self::getDurationString($file, $ffmpegPath);
        $time = explode(':', $duration);
        $hour = $time[0];
        $minutes = $time[1];
        $seconds = round($time[2]);
        $total_seconds = 0;
        $total_seconds += 60 * 60 * $hour;
        $total_seconds += 60 * $minutes;
        $total_seconds += $seconds;
        return $total_seconds;
    }
    
    public static function getDurationString(string $file, string $ffmpegPath = null): string
    {
        $ffmpeg = self::getFfmpegPath($ffmpegPath);
        $duration = shell_exec("$ffmpeg -i \"" . self::dqEscape($file) . "\" 2>&1 | grep Duration | cut -f 4 -d ' '");
        return $duration = rtrim($duration, "\n,");
    }
    
    


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private static function dqEscape(string $url):string
    {
        return str_replace('"', '\"', $url);
    }

    private static function getFfmpegPath(string $path = null): string
    {
        if (null !== $path) {
            return $path;
        }
        if (null === self::$ffmpegPath) {
            foreach (self::$ffmpegPaths as $path) {
                if (file_exists($path)) {
                    self::$ffmpegPath = $path;
                    break;
                }
            }
            if (null === self::$ffmpegPath) {
                throw new \Exception("No valid ffmpeg command found");
            }
        }
        return self::$ffmpegPath;
    }
}
