<?php


namespace Ling\Light_Kit_Admin\PageConfigurationTransformer;


use Ling\BabyYaml\Helper\BdotTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit\PageConfigurationTransformer\PageConfigurationTransformerInterface;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Kit_Admin\Service\LightKitAdminService;

/**
 * The LightKitAdminPageConfigurationTransformer class.
 */
class LightKitAdminPageConfigurationTransformer implements PageConfigurationTransformerInterface, LightServiceContainerAwareInterface
{
    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightKitAdminPageConfigurationTransformer instance.
     */
    public function __construct()
    {
        $this->container = null;
    }

    /**
     * @implementation
     */
    public function transform(array &$pageConfiguration)
    {

        //--------------------------------------------
        // ADD NOTIFICATIONS
        //--------------------------------------------
        $hasAlerts = false;
        $hasToasts = false;
        $confNotifications = BdotTool::getDotValue("zones.notifications", $pageConfiguration, []);


        /**
         * @var $kitAdmin LightKitAdminService
         */
        $kitAdmin = $this->container->get("kit_admin");
        $defaultType = $kitAdmin->getOption("notifications.default_type", "alert");
        $notifications = $kitAdmin->getNotifications();
        foreach ($notifications as $notification) {

            $notifType = $notification->getNotifType();
            if (null === $notifType) {
                $notifType = $defaultType;
            }

            switch ($notifType) {
                case "alert":
                    $hasAlerts = true;
                    $sClass = (string)$notification->getType();
                    switch ($sClass) {
                        case "success":
                            $sClass = "alert-success";
                            break;
                        case "info":
                            $sClass = "alert-primary";
                            break;
                        case "warning":
                            $sClass = "alert-warning";
                            break;
                        case "error":
                            $sClass = "alert-danger";
                            break;
                        default:
                            break;
                    }

                    $cssClass = (string)$notification->getCssClass();
                    $sClass .= " $cssClass";


                    $notifConf = [
                        "name" => "zeroadmin_notification_alert",
                        "type" => "picasso",
                        "className" => "Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminNotificationAlertWidget",
                        "widgetDir" => "templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminNotificationAlertWidget",
                        "template" => "default.php",
                        "vars" => [
                            "alert_class" => $sClass,
                            "title" => $notification->getTitle(),
                            "body" => $notification->getBody(),
                            "is_dismissible" => true,
                        ],
                    ];
                    break;
                default:
                    throw new LightKitAdminException("Unknown notification type: $notifType");
                    break;
            }
            $confNotifications[] = $notifConf;
        }

        if (true === $hasAlerts) {
            BdotTool::setDotValue("zones.notifications", $confNotifications, $pageConfiguration);
        }
    }

    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}