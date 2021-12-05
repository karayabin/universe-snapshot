<?php


namespace Ling\Light_LoginNotifier\Service;


use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_LingStandardService\Service\LightLingStandardService02;
use Ling\Light_LoginNotifier\Api\Custom\CustomLightLoginNotifierApiFactory;
use Ling\Light_Mailer\Service\LightMailerService;
use Ling\Light_User\LightWebsiteUser;

/**
 * The LightLoginNotifierService class.
 */
class LightLoginNotifierService extends LightLingStandardService02
{


    /**
     * This property holds the factory for this instance.
     * @var CustomLightLoginNotifierApiFactory
     */
    protected $factory;


    /**
     * Builds the LightLoginNotifierService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->factory = null;
    }


    /**
     * Notifies the Light_LoginNotifier plugin that a website user has just logged in.
     *
     * The action of this method depends on the configuration of the service.
     * See the @page(Light_LoginNotifier conception notes) for more details.
     *
     * @param LightWebsiteUser $user
     */
    public function onWebsiteUserLogin(LightWebsiteUser $user)
    {
        $sendToUser = $this->options['send_notification_to_user'] ?? false;
        $recordToDb = $this->options['record_to_db'] ?? false;
        $sendToAdmin = $this->options['send_notification_to_admin'] ?? null;


        /**
         * @var $mailer LightMailerService
         */
        $mailer = $this->container->get('mailer');
        $ip = $this->container->getLight()->getHttpRequest()->getIp();


        $datetime = date('Y-m-d H:i:s');
        $options = [
            'vars' => [
                'datetime' => $datetime,
                'user_identifier' => $user->getIdentifier(),
                'ip' => $ip,
                'appName' => $ip,
            ],
            'errMode' => 'log',
        ];


        if (true === $sendToUser) {
            $email = $user->getEmail();
            $mailer->send("Ling.Light_LoginNotifier/on_login_usermessage", [$email], $options);
        }

        if (null !== $sendToAdmin) {
            if (false === is_array($sendToAdmin)) {
                $sendToAdmin = [$sendToAdmin];
            }
            $mailer->send("Ling.Light_LoginNotifier/on_login_adminmessage", $sendToAdmin, $options);
        }

        if (true === $recordToDb) {
            $api = $this->getFactory()->getConnexionApi();
            $api->insertConnexion([
                'user_identifier' => $user->getIdentifier(),
                'user_id' => $user->getId(),
                'user_email' => $user->getEmail(),
                'login_date' => $datetime,
            ]);
        }

    }


    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightLoginNotifierApiFactory
     */
    public function getFactory(): CustomLightLoginNotifierApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightLoginNotifierApiFactory();
            $this->factory->setContainer($this->container);
            /**
             * @var $db LightDatabaseService
             */
            $db = $this->container->get("database");
            $this->factory->setPdoWrapper($db);
        }
        return $this->factory;
    }
}