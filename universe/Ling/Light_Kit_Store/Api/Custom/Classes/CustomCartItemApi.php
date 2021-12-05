<?php


namespace Ling\Light_Kit_Store\Api\Custom\Classes;

use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomCartItemApiInterface;
use Ling\Light_Kit_Store\Api\Generated\Classes\CartItemApi;
use Ling\Light_Kit_Store\Helper\LightKitStorePhotosHelper;
use Ling\Light_Kit_Store\Service\LightKitStoreService;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The CustomCartItemApi class.
 */
class CustomCartItemApi extends CartItemApi implements CustomCartItemApiInterface
{


    /**
     * Builds the CustomCartItemApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function getCartItemsList(): array
    {

        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->container->get("user_manager");
        $user = $_um->getOpenUser();

        $markers = [];
        if (true === $user->isValid()) {
            $userId = (int)$user->getProp("id");
            $sWhere = "ci.`user_id`=$userId";
        } else {

            /**
             * @var $_ks LightKitStoreService
             */
            $_ks = $this->container->get("kit_store");
            $markers[':visitor_identifier'] = $_ks->getVisitorIdentifier();
            $sWhere = "ci.`visitor_identifier`=:visitor_identifier";
        }


        $q = "
        select 
            ci.quantity,
            i.*
        from `$this->table` ci 
        inner join lks_item i on i.id=ci.item_id
        where $sWhere 
        order by ci.id asc
        ";


        $ret = $this->pdoWrapper->fetchAll($q, $markers);
        foreach ($ret as $k => $item) {
            $item['screenshots'] = LightKitStorePhotosHelper::toSmartScreenshots($item['screenshots']);
            $firstPhoto = LightKitStorePhotosHelper::getFirstPhotoByItem($item['screenshots']);
            $item['firstPhoto'] = $firstPhoto;
            $ret[$k] = $item;

        }


        return $ret;
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function removeCartItem(int $itemId)
    {
        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->container->get("user_manager");
        $user = $_um->getOpenUser();
        if (true === $user->isValid()) {
            $userId = $user->getProp("id");
            $this->pdoWrapper->delete($this->table, Where::inst()
                ->key("user_id")->equals($userId)->and()
                ->key("item_id")->equals($itemId)
            );
        } else {
            /**
             * @var $_ks LightKitStoreService
             */
            $_ks = $this->container->get("kit_store");
            $visitorIdentifier = $_ks->getVisitorIdentifier();
            $this->pdoWrapper->delete($this->table, Where::inst()
                ->key("visitor_identifier")->equals($visitorIdentifier)->and()
                ->key("item_id")->equals($itemId)
            );
        }

    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function userOrVisitorHasCartItem(int $itemId): bool
    {
        /**
         * @var $_um LightUserManagerService
         */

        $_um = $this->container->get("user_manager");
        $user = $_um->getOpenUser();
        if (true === $user->isValid()) {
            $res = $this->getCartItem(Where::inst()
                ->key("item_id")->equals($itemId)->and()
                ->key("user_id")->equals($user->getProp("id"))
            );
            return (null !== $res);
        } else {
            /**
             * @var $_ks LightKitStoreService
             */
            $_ks = $this->container->get("kit_store");
            $visitorIdentifier = $_ks->getVisitorIdentifier();
            $res = $this->getCartItem(Where::inst()
                ->key("item_id")->equals($itemId)->and()
                ->key("visitor_identifier")->equals($visitorIdentifier)
            );
            return (null !== $res);
        }
    }


}
