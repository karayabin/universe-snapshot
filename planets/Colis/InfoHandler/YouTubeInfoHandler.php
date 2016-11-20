<?php

namespace Colis\InfoHandler;

/*
 * LingTalfi 2016-01-14
 */
use YouTubeUtils\YouTubeTool;
use YouTubeUtils\YouTubeVideo;

class YouTubeInfoHandler implements InfoHandlerInterface
{
    private $apiKey;

    public function __construct()
    {
        //
    }

    public static function create()
    {
        return new static();
    }


    public function getInfo($name, &$err)
    {
        if (
            0 === strpos($name, 'http://') ||
            0 === strpos($name, 'https://')
        ) {
            if (false !== ($youTubeId = YouTubeTool::getId($name))) {

                if (null !== $this->apiKey) {
                    
                    $v = YouTubeVideo::create()->setVideoId($youTubeId)->setApiKey($this->apiKey);
                    $iframe = '<iframe src="https://www.youtube.com/embed/' . $youTubeId . '" frameborder="0" allowfullscreen></iframe>';


                    return [
                        'type' => 'youtube',
                        'title' => $v->getTitle(),
                        'description' => nl2br($v->getDescription()),
                        'duration' => $v->getDuration(),
                        'thumbnail' => $v->getThumbnail(),
                        'iframe' => $iframe,
                    ];
                }
                else {
                    $err = "YouTubeInfoHandler: YouTube api key not set";
                }
            }
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

}
