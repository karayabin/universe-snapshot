<?php


namespace Ling\Light_MailStats\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Logger\Service\LightLoggerService;
use Ling\Light_MailStats\Service\LightMailStatsService;


/**
 * The LightMailStatsController class.
 */
class LightMailStatsController extends LightController
{


    /**
     *
     * Collects stats and redirects the user to an url.
     *
     * See the @page(Light_MailStats conception notes) for more details.
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function redirect(HttpRequestInterface $request): HttpResponseInterface
    {

        $trackerId = $request->getGetValue("tid", false);

        $error = null;


        if (null !== $trackerId) {
            /**
             * @var $_ms LightMailStatsService
             */
            $_ms = $this->getContainer()->get("mail_stats");
            $factory = $_ms->getFactory();


            $trackerApi = $factory->getTrackerApi();


            $trackerRow = $trackerApi->getTrackerById($trackerId);
            if (null !== $trackerRow) {


                // collect stats
                $statsApi = $factory->getStatsApi();
                $statsApi->insertStats([
                    "group" => $trackerRow['group'],
                    "name" => $trackerRow['name'],
                    "url" => $trackerRow['url'],
                    "date_sent" => $trackerRow['date_sent'],
                    "date_opened" => date('Y-m-d H:i:s'),
                    "host" => $_SERVER['HTTP_HOST'] ?? 'unknown',
                    "user_agent" => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
                    "accept_language" => $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'unknown',
                    "remote_address" => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
                ]);
                $response = new HttpRedirectResponse();
                $response->setUrl($trackerRow['url']);


            } else {
                $error = "invalid tracker.";
            }
        } else {
            $error = "tracker id missing.";
        }

        if (null !== $error) {
            $response = new HttpResponse($error, 404);
        }


        return $response;
    }


    /**
     *
     *
     * Collects the open tracker stat silently, and displays a 1x1 px transparent gif.
     *
     * If errors occur, they are logged.
     *
     *
     * Expected parameters are (via GET):
     *
     * - tid: string, the tracker id
     * - ?tiid: string=null, the tracker image id. If set, allows you to choose which tracker image is used.
     *      In order to do this, you also need to define the type first in our service configuration.
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function collectOpenTrackerStat(HttpRequestInterface $request): HttpResponseInterface
    {
        $trackerId = $request->getGetValue("tid", false);
        $trackerImgId = $request->getGetValue("tiid", false) ?? "_default";

        $error = null;


        /**
         * @var $_ms LightMailStatsService
         */
        $_ms = $this->getContainer()->get("mail_stats");


        if (null !== $trackerId) {
            $factory = $_ms->getFactory();


            $trackerApi = $factory->getTrackerApi();


            $trackerRow = $trackerApi->getTrackerById($trackerId);
            if (null !== $trackerRow) {


                // collect stats
                $statsApi = $factory->getStatsApi();
                $statsApi->insertStats([
                    "group" => $trackerRow['group'],
                    "name" => $trackerRow['name'],
                    "url" => $trackerRow['url'],
                    "date_sent" => $trackerRow['date_sent'],
                    "date_opened" => date('Y-m-d H:i:s'),
                    "host" => $_SERVER['HTTP_HOST'] ?? 'unknown',
                    "user_agent" => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
                    "accept_language" => $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'unknown',
                    "remote_address" => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
                ]);
                $response = new HttpRedirectResponse();
                $response->setUrl($trackerRow['url']);


            } else {
                $error = "Tracker row not found with id: $trackerId.";
            }
        } else {
            $error = "tracker id missing.";
        }


        $defaultImgPath = __DIR__ . "/../assets/image/transparent.gif";


        $trackerImgs = $_ms->getOption("tracker_img", []);
        if (true === array_key_exists($trackerImgId, $trackerImgs)) {
            $trackerImgInfo = $trackerImgs[$trackerImgId];
            $imgPath = $trackerImgInfo['img'];
            if ("_default" === $imgPath) {
                $imgPath = $defaultImgPath;
            }
            if (false === file_exists($imgPath)) {
                $error = "Tracker image path doesn't exist: $imgPath.";
                $imgPath = $defaultImgPath;
            }

        } else {
            $error = "Undefined tracker image id: $trackerImgId.";
            $imgPath = $defaultImgPath;
        }


        //--------------------------------------------
        // logging errors silently
        //--------------------------------------------


        if (null !== $error) {
            /**
             * @var $_lo LightLoggerService
             */
            $_lo = $this->getContainer()->get("logger");
            $_lo->error(__METHOD__ . ": " . $error);
        }


        $imgBin = file_get_contents($imgPath);
        $response = new HttpResponse($imgBin);
        $response->addHeader("Content-Type", "image/gif");
        return $response;
    }


}