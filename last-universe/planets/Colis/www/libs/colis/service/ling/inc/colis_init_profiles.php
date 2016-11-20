<?php


//------------------------------------------------------------------------------/
// COLIS LING - DEMO INIT - PROFILES VERSION
//------------------------------------------------------------------------------/
/**
 * In prod, you'll replace this file by your application config file of course...
 * bigbang is just a fast way to getting started.
 */
require_once "bigbang.php";
require_once "demo.func.php";


define('WEB_ROOT_DIR', realpath(__DIR__ . "/../../../../../../www"));
define('YOUTUBE_API_KEY', "your API_KEY here..."); // use your youtube api key here
define('ITEMS_DIR_URL', '/uploads');


$profiles = [
    'episode-thumbnail' => [
        /**
         * The max number of chunks.
         */
        'maxChunks' => 2000,
        'extensions' => ['mp4', 'jpg', 'jpeg', 'png', 'gif'],
        'targetDir' => WEB_ROOT_DIR . ITEMS_DIR_URL,
    ],
];


function colis_get_profile($id)
{
    global $profiles;
    if (array_key_exists($id, $profiles)) {
        return $profiles[$id];
    }
    return false;
}

function colis_on_upload_after($filePath, $profileId)
{

}

function colis_get_info($name, $profileId)
{
    /**
     * You could use profileId here to shorten the algorithm a little bit,
     * but I didn't use it in this particular demo
     */
    return colis_get_info_by_name($name);
}
