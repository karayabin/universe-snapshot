<?php


namespace Ling\Light_QuickMailAlert\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Mailer\Service\LightMailerService;
use Ling\Light_QuickMailAlert\Exception\LightQuickMailAlertException;


/**
 * The LightQuickMailAlertService class.
 */
class LightQuickMailAlertService
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
     * - appName: the name of the app, which is used as a variable in some mail templates
     *
     *
     * See the @page(Light_QuickMailAlert conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * This property holds the groups for this instance.
     * It's an array of groupName => groupItem,
     * with groupItem: an array:
     * - template: string, the name of the mail template to use
     * - recipients: array, the list of recipients to send the mail to (each recipient must be a valid email address)
     *
     *
     *
     * @var array
     */
    protected $groups;


    /**
     * Builds the LightQuickMailAlertService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->options = [];
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
     * Sets the groups.
     *
     * @param array $groups
     */
    public function setGroups(array $groups)
    {
        $this->groups = $groups;
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
     * Sends an email according to the settings identified by the groupName, and returns the number of successful emails sent.
     *
     * If the msg variable is set, it will be injected in the template (if the template allows it).
     *
     * @param string $groupName
     * @param string|null $msg
     */
    public function sendGroup(string $groupName, string $msg = null): int
    {
        if (array_key_exists($groupName, $this->groups)) {
            $groupItem = $this->groups[$groupName];
            $tpl = $groupItem['template'];
            $recipients = $groupItem['recipients'];
            $appName = $this->options['appName'] ?? 'myAwesomeApplication';


            /**
             * @var $mailer LightMailerService
             */
            $mailer = $this->container->get("mailer");
            return $mailer->send($tpl, $recipients, [
                "vars" => [
                    "appName" => $appName,
                    "msg" => (string)$msg,
                ]
            ]);

        } else {
            $this->error("Undefined group: $groupName.");
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
        throw new LightQuickMailAlertException("LightQuickMailAlertService: " . $msg);
    }


}