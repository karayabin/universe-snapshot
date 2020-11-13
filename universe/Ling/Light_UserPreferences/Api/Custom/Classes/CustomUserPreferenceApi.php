<?php


namespace Ling\Light_UserPreferences\Api\Custom\Classes;

use Ling\Light_User\LightWebsiteUser;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\Light_UserPreferences\Api\Custom\Interfaces\CustomUserPreferenceApiInterface;
use Ling\Light_UserPreferences\Api\Generated\Classes\UserPreferenceApi;
use Ling\Light_UserPreferences\Exception\LightUserPreferencesException;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The CustomUserPreferenceApi class.
 */
class CustomUserPreferenceApi extends UserPreferenceApi implements CustomUserPreferenceApiInterface
{


    /**
     * Builds the CustomUserPreferenceApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    public function getPreferencesByUserId(int $userId = null, array $options = []): array
    {
        if (null === $userId) {
            /**
             * @var $manager LightUserManagerService
             */
            $manager = $this->container->get("user_manager");
            $user = $manager->getUser();
            if (false === $user->isValid()) {
                $this->error("The current user is not valid.");
            }
            if (false === $user instanceof LightWebsiteUser) {
                $this->error("The current user is not a LightWebsiteUser.");
            }
            $userId = $user->getId();
        }


        $groupByPlugin = $options['groupByPlugin'] ?? false;
        if (true === $groupByPlugin) {
            return $this->pdoWrapper->fetchAll("select plugin, id, lud_user_id, name, value, text_value, value_type from `$this->table` where lud_user_id=$userId", [], \PDO::FETCH_GROUP | \PDO::FETCH_ASSOC);
        }
        return $this->getUserPreferences(Where::inst()->key("lud_user_id")->equals($userId));
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightUserPreferencesException($msg);
    }
}
