<?php


namespace Ling\Light_Kit_Store\Light_DatabaseFakeDataMaker\Generator;


use Ling\Light_DatabaseFakeDataMaker\Generator\LightDatabaseFakeDataGenerator;


/**
 * The LightKitStoreUserRatesItemFakeGenerator class.
 */
class LightKitStoreUserRatesItemFakeGenerator extends LightDatabaseFakeDataGenerator
{

    /**
     * Builds the LightKitStoreUserRatesItemFakeGenerator instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this
            ->addColumnGenerator("user_id", "_select:lks_user:id")
            ->addColumnGenerator("item_id", "_select:lks_item:id")
            ->addColumnGenerator("rating", "_between:1:5")
            ->addColumnGenerator("rating_comment", [
               "This product sucks",
               "This product is cool",
               "I love this product",
               "I really enjoyed this product, does the job",
               "Not really good, I had problem with the shipping",
            ]);
    }
}