<?php

use Bat\FileSystemTool;
use YouTubeUtils\YouTubeTool;
use YouTubeUtils\YouTubeVideo;


/**
 * This function returns the duration of a local video (not from an external url).
 * This is a demo (not in prod) function that is used by some of the demos here.
 * 
 * 
 *
 * It uses ffprobe.
 * In order to use it, you need to replace the $pathToFFProbe variable value by YOUR ffprobe tool location 
 * (or use another tool that does the job).
 * 
 * 
 * If you are not sure, type the following in a terminal:
 *
 *          which ffprobe
 *
 * If nothing shows up, you need to install it.
 *
 */
function getVideoDuration($file)
{

    $pathToFFProbe = '/opt/local/bin/ffprobe';
    $cmd = $pathToFFProbe . ' -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 "' . str_replace('"', '\"', $file) . '"';
    $ret = 0;
    ob_start();
    passthru($cmd, $ret);
    return ob_get_clean();
}



function colis_get_info_by_name($name)
{


    $type = 'none';
    $ext = strtolower(FileSystemTool::getFileExtension($name));
    $ext2Type = [
        'jpg' => 'image',
        'jpeg' => 'image',
        'gif' => 'image',
        'png' => 'image',
        'mp4' => 'video',
    ];
    if (array_key_exists($ext, $ext2Type)) {
        $type = $ext2Type[$ext];
    }

    $finalName = null;

    if (
        0 === strpos($name, 'http://') ||
        0 === strpos($name, 'https://')
    ) {
        $finalName = $name;
        // handling youtube urls
        if ('video' === $type) {
            $type = 'externalVideo';
        }
        elseif (false !== ($youTubeId = YouTubeTool::getId($finalName))) {
            $type = 'youtube';

        }
    }
    else {
        // look for a file named name in a specific dir...
        $finalName = ITEMS_DIR_URL . '/' . $name;
    }

    switch ($type) {
        case 'image':
            return [
                'type' => $type,
                'src' => $finalName,
            ];
            break;
        case 'youtube':
            $v = YouTubeVideo::create()->setVideoId($youTubeId)->setApiKey(YOUTUBE_API_KEY);
            $iframe = '<iframe src="https://www.youtube.com/embed/' . $youTubeId . '" frameborder="0" allowfullscreen></iframe>';


            return [
                'type' => $type,
                'title' => $v->getTitle(),
                'description' => nl2br($v->getDescription()),
                'duration' => $v->getDuration(),
                'thumbnail' => $v->getThumbnail(),
                'iframe' => $iframe,
            ];

            break;
        case 'externalVideo':
            $realPath = WEB_ROOT_DIR . $finalName;
            return [
                'type' => $type,
                'src' => $finalName,
            ];
            break;
        case 'video':
            $realPath = WEB_ROOT_DIR . $finalName;
            $duration = getVideoDuration($realPath);
            return [
                'type' => 'localVideo',
                'src' => $finalName,
                'duration' => $duration,
            ];
            break;
        default:
            return [
                "type" => $type,
            ];
            break;
    }
}
