<?php


namespace Ling\Light_Kit_Store\Api\Custom\Classes;

use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserApiInterface;
use Ling\Light_Kit_Store\Api\Generated\Classes\UserApi;
use Ling\Light_Kit_Store\Exception\LightKitStoreException;
use Ling\Light_Kit_Store\Helper\LightKitStorePasswordHelper;
use Ling\Light_UserManager\Service\LightUserManagerService;


/**
 * The CustomUserApi class.
 */
class CustomUserApi extends UserApi implements CustomUserApiInterface
{


    /**
     * Builds the CustomUserApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function getUserByToken(string $token, string $tokenType, mixed $default = null, bool $throwNotFoundEx = false)
    {

        switch ($tokenType) {
            case "remember_me":
            case "signup":
            case "reset_password":
                $col = $tokenType . "_token";
                break;
            case "default":
                $col = "token";
                break;
            default:
                throw new LightKitStoreException("Undefined token type: $tokenType.");
        }


        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where $col=:token", [
            "token" => $token,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with $col=$token.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function updatePassword(string $newPassword)
    {
        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->container->get("user_manager");
        $user = $_um->getOpenUser();


        if (true === $user->isValid()) {
            $id = $user->getProp("id");

            $this->updateUserById($id, [
                "password" => LightKitStorePasswordHelper::encrypt($newPassword),
            ]);
        } else {
            throw new LightKitStoreException("The user is not connected.");
        }
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function getUserCheckoutInfo(): array
    {
        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->container->get("user_manager");
        $user = $_um->getOpenUser();
        az($user);
        if (true === $user->isValid()) {
            $q = "
select 
from 
    lks_user u 
    left join lks_address a on a.user_id=u.id
    left join lks_payment a on a.user_id=u.id
    
    
            ";
        }


        return [];
    }


}
