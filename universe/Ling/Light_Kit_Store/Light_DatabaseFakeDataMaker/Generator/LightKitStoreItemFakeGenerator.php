<?php


namespace Ling\Light_Kit_Store\Light_DatabaseFakeDataMaker\Generator;


use Ling\Light_DatabaseFakeDataMaker\Generator\LightDatabaseFakeDataGenerator;


/**
 * The LightKitStoreItemFakeGenerator class.
 */
class LightKitStoreItemFakeGenerator extends LightDatabaseFakeDataGenerator
{

    /**
     * Builds the LightKitStoreItemFakeGenerator instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this
            ->addColumnGenerator("author_id", "1")
            ->addColumnGenerator("label", function ($index) {
                return "website$index";
            })
            ->addColumnGenerator("reference", function ($index) {
                return "kw$index";
            })
            ->addColumnGenerator("item_type", "1")
            ->addColumnGenerator("provider", function ($index) {
                return "x$index";
            })
            ->addColumnGenerator("identifier", function ($index) {
                return "x$index";
            })
            ->addColumnGenerator("description", function ($index) {
                return "This is the komin> website$index website. It's a basic website.";
            })
            ->addColumnGenerator("price_in_euro", "0.00")
            ->addColumnGenerator("screenshots", "- /libs/universe/Ling/Light_Kit_Store/img/kit-store-lightning.png

")
            ->addColumnGenerator("status", "1");
    }
}