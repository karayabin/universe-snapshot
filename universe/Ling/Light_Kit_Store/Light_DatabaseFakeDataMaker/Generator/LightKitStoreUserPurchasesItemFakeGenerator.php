<?php


namespace Ling\Light_Kit_Store\Light_DatabaseFakeDataMaker\Generator;


use Ling\Light_DatabaseFakeDataMaker\Generator\LightDatabaseFakeDataGenerator;


/**
 * The LightKitStoreUserPurchasesItemFakeGenerator class.
 */
class LightKitStoreUserPurchasesItemFakeGenerator extends LightDatabaseFakeDataGenerator
{

    /**
     * Builds the LightKitStoreUserPurchasesItemFakeGenerator instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this
            ->addColumnGenerator("user_id", "_select:lks_user:id")
            ->addColumnGenerator("item_id", "_select:lks_item:id")
            ->addColumnGenerator("payment_method", "x")
            ->addColumnGenerator("purchased_price", "0.0");
    }
}