<?php


namespace Ling\Light_MailStats\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_MailStats\Api\Custom\CustomLightMailStatsApiFactory;
use Ling\Light_MailStats\Exception\LightMailStatsException;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;


/**
 * The LightMailStatsService class.
 */
class LightMailStatsService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(Light_MailStats conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;

    /**
     * This property holds the factory for this instance.
     * @var CustomLightMailStatsApiFactory|null
     */
    protected ?CustomLightMailStatsApiFactory $factory;


    /**
     * Builds the LightMailStatsService instance.
     */
    public function __construct()
    {
        $this->options = [];
        $this->factory = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Returns the option value corresponding to the given key.
     * If the option is not found, the return depends on the throwEx flag:
     *
     * - if set to true, an exception is thrown
     * - if set to false, the default value is returned
     *
     *
     * @param string $key
     * @param null $default
     * @param bool $throwEx
     */
    public function getOption(string $key, $default = null, bool $throwEx = false)
    {
        if (true === array_key_exists($key, $this->options)) {
            return $this->options[$key];
        }
        if (true === $throwEx) {
            $this->error("Undefined option: $key.");
        }
        return $default;
    }


    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightMailStatsApiFactory
     */
    public function getFactory(): CustomLightMailStatsApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightMailStatsApiFactory();
            $this->factory->setContainer($this->container);
            /**
             * @var $db LightDatabaseService
             */
            $db = $this->container->get("database");
            $this->factory->setPdoWrapper($db);
        }
        return $this->factory;
    }


    /**
     * Returns the route name corresponding to the given identifier.
     *
     * Possible identifiers are:
     *
     *
     * - redirect: the route to the redirect service
     * - collect_open_stat: the route to the service which collects the open tracker stats
     *
     *
     * @param string $identifier
     * @return string
     * @throws \Exception
     */
    public function getRouteName(string $identifier): string
    {
        switch ($identifier) {
            case "redirect":
                return "lms_route-redirect";
            case "collect_open_stat":
                return "lms_route-collect_open_stat";
            default:
                $this->error("Unknown identifier $identifier.");
                break;
        }
    }


    /**
     * Creates a tracker of type "click", with the given identifier, and returns the tracker url.
     *
     * The identifier has the following format:
     *
     * - $group.$name
     *
     *
     * With:
     *
     * - $group: the group of the tracker
     * - $name: the name of the tracker.
     *      Note that our system will automatically prepend your name with "click-", for organization purpose.
     *      See the click open naming convention in our conception notes for more details.
     *
     *
     *
     *
     * @param string $identifier
     * @param string $url
     * @return string
     * @throws \Exception
     */
    public function createClickTracker(string $identifier, string $url): string
    {
        $p = explode(".", $identifier, 2);
        if (2 === count($p)) {
            list($group, $name) = $p;
            $name = "click-" . $name;


            $trackerApi = $this->getFactory()->getTrackerApi();
            $trackerId = $trackerApi->insertTracker([
                "group" => $group,
                "name" => $name,
                "url" => $url,
                "date_sent" => date("Y-m-d H:i:s"),
            ]);


            $routeName = $this->getRouteName("redirect");
            /**
             * @var $_rr LightReverseRouterService
             */
            $_rr = $this->container->get("reverse_router");


            return $_rr->getUrl($routeName, [
                "tid" => $trackerId,
            ], true);


        } else {
            $this->error("Invalid tracker identifier: $identifier.");
        }
    }


    /**
     * Creates a tracker of type "open", with the given identifier, and returns the html code for the generated image.
     *
     *
     * The identifier has the following format:
     *
     * - $group.$name
     *
     *
     * With:
     *
     * - $group: the group of the tracker
     * - $name: the name of the tracker.
     *      Note that our system will automatically prepend your name with "open-", for organization purpose.
     *      See the click open naming convention in our conception notes for more details.
     *
     * Available options are:
     * - trackerImgId: string, the tracker image id. Use this to change the tracker image.
     *
     *
     *
     *
     *
     * @param string $identifier
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public function createOpenTracker(string $identifier, array $options = []): string
    {
        $trackerImgId = $options['trackerImgId'] ?? null;


        $p = explode(".", $identifier, 2);
        if (2 === count($p)) {
            list($group, $name) = $p;
            $name = "open-" . $name;

            $routeName = $this->getRouteName("collect_open_stat");
            /**
             * @var $_rr LightReverseRouterService
             */
            $_rr = $this->container->get("reverse_router");


            $trackerApi = $this->getFactory()->getTrackerApi();
            $trackerId = $trackerApi->insertTracker([
                "group" => $group,
                "name" => $name,
                "url" => "",
                "date_sent" => date("Y-m-d H:i:s"),
            ]);


            $urlParams = [
                "tid" => $trackerId,
            ];
            $trackerAlt = "transparent stat tracker";
            if (null !== $trackerImgId) {
                $urlParams["tiid"] = $trackerImgId;
                $trackerImgs = $this->getOption("tracker_img", []);
                if (true === array_key_exists($trackerImgId, $trackerImgs)) {
                    $trackerImgInfo = $trackerImgs[$trackerImgId];
                    $trackerAlt = $trackerImgInfo["alt"] ?? $trackerAlt;
                }
            }

            $collectStatUrl = $_rr->getUrl($routeName, $urlParams, true);


            return '<img src="' . htmlspecialchars($collectStatUrl) . '" alt="' . htmlspecialchars($trackerAlt) . '" />';


        } else {
            $this->error("Invalid tracker identifier: $identifier.");
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightMailStatsException($msg);
    }

}