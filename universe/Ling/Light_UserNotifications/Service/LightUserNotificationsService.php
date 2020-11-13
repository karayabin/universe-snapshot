<?php


namespace Ling\Light_UserNotifications\Service;


use Ling\Light_LingStandardService\Service\LightLingStandardService01;
use Ling\Light_UserNotifications\Api\Custom\CustomLightUserNotificationsApiFactory;
use Ling\SimplePdoWrapper\Util\Where;

/**
 * The LightUserNotificationsService class.
 */
class LightUserNotificationsService extends LightLingStandardService01
{

    /**
     * In addition to the parent class' options,
     * the following options are available:
     * - messageArchiveTime: int, The theoretical number of days a message stays in the database, once it's deleted by the user.
     *
     * @var int
     */
    protected $options;


    /**
     * This property holds the factory for this instance.
     * @var CustomLightUserNotificationsApiFactory
     */
    protected $factory;


    /**
     * Builds the LightUserNotificationsService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->factory = null;
    }


    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightUserNotificationsApiFactory
     */
    public function getFactory(): CustomLightUserNotificationsApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightUserNotificationsApiFactory();
            $this->factory->setContainer($this->container);
            $this->factory->setPdoWrapper($this->container->get("database"));
        }
        return $this->factory;
    }


    /**
     * Removes the notifications marked as deleted by the user, which are older than x=messageArchiveTime days.
     *
     * With messageArchiveTime being defined in the options of this service.
     *
     *
     */
    public function executeCleaningRoutine()
    {
        $messageArchiveTime = $this->options['messageArchiveTime'] ?? 30;
        $limitDateTime = date("Y-m-d H:i:s", time() - ($messageArchiveTime * 86400));
        $this->getFactory()->getUserNotificationApi()->delete(Where::inst()
            ->key('status')->equals("1")
            ->and()->key('date_deletion')->isNotNull()
            ->and()->key('date_deletion')->lessThan($limitDateTime)
        );
    }


}