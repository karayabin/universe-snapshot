<?php



//------------------------------------------------------------------------------/
// COLIS LING - DEMO INIT - MIXED VERSION
//------------------------------------------------------------------------------/
use Colis\InfoHandler\ImageInfoHandler;
use Colis\InfoHandler\VideoInfoHandler;
use Colis\InfoHandler\YouTubeInfoHandler;
use Colis\ServiceHandler\LingColisServiceHandler;

require_once "bigbang.php"; // start the local universe


/**
 * Imagine that this is the init file of your application, so you have total control on the handler...
 */

define('WEB_ROOT_DIR', realpath(__DIR__ . "/../../../../../../www"));
define('YOUTUBE_API_KEY', "your API_KEY here..."); // use your youtube api key here
define('ITEMS_DIR_URL', '/uploads');
define('TARGET_DIR', WEB_ROOT_DIR . ITEMS_DIR_URL);

function colis_get_services_handler($profileId)
{

    switch ($profileId) {
        case 'episode-thumbnail':
            return LingColisServiceHandler::create()
                ->setExtensions(['mp4', 'jpeg', 'jpg', 'png', 'gif'])// extensions allowed for uploaded chunks
                ->setMaxChunks(2000)
                ->setTargetDir(TARGET_DIR)
                ->addInfoHandler(YouTubeInfoHandler::create()->setApiKey(YOUTUBE_API_KEY))
                ->addInfoHandler(ImageInfoHandler::create()
                        ->setDir(TARGET_DIR)
                        ->setExtensions(['jpeg', 'jpg', 'png', 'gif'])
                        ->setWebRootDir(WEB_ROOT_DIR)
                )
                ->addInfoHandler(VideoInfoHandler::create()
                    ->setDir(TARGET_DIR)
                    ->setExtensions(['mp4'])
                    ->setWebRootDir(WEB_ROOT_DIR)
                    ->setFfprobePath('/opt/local/bin/ffprobe')
                );
            
            break;
        default:
            break;
    }

}



