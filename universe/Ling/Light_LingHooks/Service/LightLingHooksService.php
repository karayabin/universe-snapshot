<?php


namespace Ling\Light_LingHooks\Service;


use Exception;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_LingHooks\Exception\LightLingHooksException;
use Ling\Light_QuickMailAlert\Service\LightQuickMailAlertService;


/**
 * The LightLingHooksService class.
 */
class LightLingHooksService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(Light_LingHooks conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;

    /**
     * This property holds the inotifications for this instance.
     * It's an array of feeder => feederItem,
     * with
     * - feeder: string, the feeder name
     * - feederItem: array of type => groups
     * - type: string, the message type, or the asterisk (to match all message types)
     * - groups: array of group
     * - group: string, the name of the quick mail alert group to send the email to
     *
     *
     * @var array
     */
    protected $inotifications;


    /**
     * Builds the LightLingHooksService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->options = [];
        $this->inotifications = [];
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
     * Adds important notifications.
     * See the important notification section of the @page(Light_LingHooks conception notes) for more details.
     *
     *
     * @param array $notifications
     */
    public function addImportantNotifications(array $notifications)
    {
        foreach ($notifications as $notification) {
            $feeder = $notification['feeder'];
            $type = $notification['type'];
            $group = $notification['group'];


            if (false === array_key_exists($feeder, $this->inotifications)) {
                $this->inotifications[$feeder] = [];
            }
            if (false === array_key_exists($type, $this->inotifications[$feeder])) {
                $this->inotifications[$feeder][$type] = [];
            }

            $this->inotifications[$feeder][$type] = array_merge($this->inotifications[$feeder][$type], [$group]);
        }
    }


    /**
     *
     * When an userNotification is sent, send an email alert to the admin, depending on the configuration.
     *
     * The user notifications are handled by [the Light_UserNotifications plugin](https://github.com/lingtalfi/Light_UserNotifications).
     * The email alert is sent using the [Light_QuickMailAlert plugin](https://github.com/lingtalfi/Light_QuickMailAlert/).
     *
     * Note: we use the @page(light dynamic registration event system).
     *
     *
     *
     *
     * @param LightEvent $data
     * @throws /Exception
     */
    public function onUserNotificationSendQuickMailAlert(LightEvent $data)
    {
        $notif = $data->getVar('arguments')[0];
        $feeder = $notif['feeder'];
        $type = $notif['type'];
        $message = $notif['message'];
        $date = $notif['date_creation'];
        if (array_key_exists($feeder, $this->inotifications)) {
            $groups = [];
            if (array_key_exists('*', $this->inotifications[$feeder])) {
                $groups = array_merge($groups, $this->inotifications[$feeder]['*']);
            }
            if (array_key_exists($type, $this->inotifications[$feeder])) {
                $groups = array_merge($groups, $this->inotifications[$feeder][$type]);
            }
            if ($groups) {
                /**
                 * @var $quickMail LightQuickMailAlertService
                 */
                $quickMail = $this->container->get("quick_mail_alert");

                $msg = "An important notification has been sent on $date, with feeder=\"$feeder\", type=\"$type\", and message: \"$message\".";
                foreach ($groups as $group) {
                    $quickMail->sendGroup($group, $msg);
                }
            }
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
        throw new LightLingHooksException($msg);
    }

}