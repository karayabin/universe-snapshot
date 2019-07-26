<?php


namespace Ling\Light_Kit_Admin\Service;


use Ling\BabyYaml\Helper\BdotTool;
use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;
use Ling\Light_Kit_Admin\Notification\LightKitAdminNotification;

/**
 * The LightKitAdminService class.
 * This is the main service of the Light_Kit_Admin plugin.
 *
 * It serves as the holder of all the configuration related to (light) kit admin,
 * and in general is the central point of many things related to the light kit admin plugin.
 *
 * For instance, this service holds the notifications.
 *
 *
 */
class LightKitAdminService implements LightInitializerInterface
{


    /**
     * This property holds the notifications for this instance.
     *
     * @var LightKitAdminNotification[]
     */
    protected $notifications;


    /**
     * This property holds the options for this instance.
     * This array is the configuration of the light kit admin plugin.
     * @var array
     */
    protected $options;


    /**
     * Builds the LightKitAdminService instance.
     */
    public function __construct()
    {
        $this->notifications = [];
        $this->options = [];
    }

    /**
     * Set the options for this light kit admin service instance.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Gets the option identified by the given key (@page(bdot path)),
     * or returns the given $default otherwise (if the key is not found in the options array).
     *
     *
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getOption(string $key, $default = null)
    {
        return BdotTool::getDotValue($key, $this->options, $default);
    }


    /**
     * Returns the notifications of this instance.
     *
     * @return LightKitAdminNotification[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }


    /**
     * Adds a notification to this instance.
     *
     * @param LightKitAdminNotification $notif
     * @return void
     */
    public function addNotification(LightKitAdminNotification $notif)
    {
        $this->notifications[] = $notif;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
//        $light->registerErrorHandler([$this, "errorHandler"]);

    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * This is the error handler for the kit_admin service (the the Light instance).
     * It does the following:
     *
     * - when an user has insufficient rights, she is redirected to a page that tell
     *
     */
    protected function errorHandler()
    {

    }
}