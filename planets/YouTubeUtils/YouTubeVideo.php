<?php

namespace YouTubeUtils;

/*
 * LingTalfi 2016-01-09
 * This uses YouTube Data Api v3
 * https://developers.google.com/youtube/v3/docs/videos/list#try-it
 *
 * 
 * The following methods all throws the same exceptions:
 * 
 * - getDuration
 * - getTitle
 * - getDescription
 * - getThumbnail
 * - getPublishedTime
 *  
 * @throws YouTubeRequestErrorException when the youtube server responds with an error
 * @throws YouTubeUtilsException for unexpected errors (dev error)
 * @throws ApiBadInterpretationException when the class used the api in a wrong way (helps detecting api changes)
 * 
 */
use YouTubeUtils\Exception\ApiBadInterpretationException;
use YouTubeUtils\Exception\YouTubeRequestErrorException;
use YouTubeUtils\Exception\YouTubeUtilsException;

class YouTubeVideo
{


    private $apiKey;
    private $id;
    private $onApiBadInterpretationCb;
    private $onNoResultCb;
    //
    private $item;


    public static function create()
    {
        return new static();
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->renew();
        return $this;
    }

    public function setVideoId($id)
    {
        $this->id = $id;
        $this->renew();
        return $this;
    }

    public function setOnApiBadInterpretationCb(callable $onApiBadInterpretationCb)
    {
        $this->onApiBadInterpretationCb = $onApiBadInterpretationCb;
        return $this;
    }

    public function setOnNoResultCb(callable $onNoResultCb)
    {
        $this->onNoResultCb = $onNoResultCb;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     *
     * Return duration in seconds
     *
     * @return int, duration in seconds
     */
    public function getDuration()
    {
        $this->initialRequest();
        if (isset($this->item['contentDetails']['duration'])) {

            $date = new \DateInterval($this->item['contentDetails']['duration']);
            $ret = 0;
            $ret += (int)$date->format('%d') * 86400;
            $ret += (int)$date->format('%h') * 3600;
            $ret += (int)$date->format('%i') * 60;
            $ret += (int)$date->format('%s');
            return $ret;
        }
        else {
            $this->onApiBadInterpretation("contentDetails.duration not found");
        }
    }

    public function getTitle()
    {
        $this->initialRequest();
        if (isset($this->item['snippet']['title'])) {
            return $this->item['snippet']['title'];
        }
        else {
            $this->onApiBadInterpretation("snippet.title not found");
        }
    }

    public function getDescription()
    {
        $this->initialRequest();
        if (isset($this->item['snippet']['description'])) {
            return $this->item['snippet']['description'];
        }
        else {
            $this->onApiBadInterpretation("snippet.description not found");
        }
    }

    /**
     * Return the thumbnail's url.
     *
     *
     * In the present day, the available thumbnail types are:
     *
     * - default: ( 120 x 90 )
     * - medium: ( 350 x 180 )
     * - high: ( 480 x 360 )
     * - standard: ( 640 x 480 )
     * - maxres: ( 1280 x 720 )
     *
     *
     */
    public function getThumbnail($type = 'default')
    {
        $this->initialRequest();
        if (isset($this->item['snippet']['thumbnails'][$type]['url'])) {
            return $this->item['snippet']['thumbnails'][$type]['url'];
        }
        else {
            $this->onApiBadInterpretation("snippet.thumbnails.$type.url not found");
        }
    }


    /**
     * Returns date in mysql format (2016-01-09 20:54:18)
     */
    public function getPublishedTime()
    {
        $this->initialRequest();
        if (isset($this->item['snippet']['publishedAt'])) {
            return date('Y-m-d H:i:s', strtotime($this->item['snippet']['publishedAt']));
        }
        else {
            $this->onApiBadInterpretation("snippet.publishedAt not found");
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function initialRequest()
    {
        if (null === $this->item) {
            if (null !== $this->apiKey) {
                if (null !== $this->id) {
                    $url = "https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails&id=" . $this->id . "&key=" . $this->apiKey;
                    $response = json_decode(file_get_contents($url), true);
                    if (array_key_exists('error', $response)) {
                        $msg = "Unknown reason";
                        if (array_key_exists('message', $response['error'])) {
                            $msg = $response['error']['message'];
                        }
                        else {
                            $this->onApiBadInterpretation("error.message not found");
                        }
                        throw new YouTubeRequestErrorException($msg);
                    }
                    else {
                        if (!empty($response['items'])) {
                            if (isset($response['items'][0])) {
                                $this->item = $response['items'][0];
                            }
                            else {
                                $this->onApiBadInterpretation("items.0 not found");
                            }
                        }
                        else {
                            $this->onNoResult("No result for video with id: $this->id");
                        }
                    }
                }
                else {
                    throw new YouTubeUtilsException("video id not set");
                }
            }
            else {
                throw new YouTubeUtilsException("apiKey not set");
            }
        }
    }

    /**
     * Since api evolve, this function can be used to track changes in apis,
     * or even api misinterpretation.
     */
    private function onApiBadInterpretation($msg)
    {
        if (null !== $this->onApiBadInterpretationCb) {
            call_user_func($this->onApiBadInterpretationCb, $msg);
        }
        throw new ApiBadInterpretationException($msg);
    }


    private function onNoResult($msg)
    {
        if (null !== $this->onNoResultCb) {
            call_user_func($this->onNoResultCb, $msg);
        }
        else {
            trigger_error($msg, E_USER_NOTICE);
        }
    }

    private function renew()
    {
        $this->item = null;
    }
}
