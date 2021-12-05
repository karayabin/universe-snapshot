<?php


namespace Ling\Light_Kit_Store\Light_DatabaseFakeDataMaker\Generator;


use Ling\Light_DatabaseFakeDataMaker\Generator\LightDatabaseFakeDataGenerator;


/**
 * The LightKitStoreUserFakeGenerator class.
 */
class LightKitStoreUserFakeGenerator extends LightDatabaseFakeDataGenerator
{

    /**
     * Builds the LightKitStoreUserFakeGenerator instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this
            ->addColumnGenerator("email", [
                "pierre",
                "paul",
                "jack",
                "curby",
                "tonio",
                "tania",
                "elise",
                "emma",
                "nanou",
                "pillule",
                "piwi",
                "jack",
                "john",
                "phil",
                "jules",
                "julian",
                "julien",
                "jean",
                "jean-michel",
                "etienne",
                "marcel",
                "adobe",
            ])
            ->addColumnGenerator("password", function ($index) {
                return "abcfakepass";
            })
            ->addColumnGenerator("active", "1");
    }
}