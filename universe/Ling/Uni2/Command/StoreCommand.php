<?php


namespace Ling\Uni2\Command;


/**
 * The StoreCommand class.
 *
 * This class will import the given planet to the local server.
 * It uses the same algorithm as the @object(reimportCommand).
 *
 *
 * This command will import a planet (in the local server) only if either of the following cases is true:
 *
 * - the planet directory does not exist yet in the local server
 * - the planet directory exist in the local server, but there is a newer version of this planet (defined in @concept(the local dependency master))
 * - the force flag (-f) is set to true
 *
 * The same applies recursively to the planet dependencies (if any).
 *
 * Note: non-planet items behave differently: they are only imported if their directory doesn't exist yet in the local server.
 *
 *
 *
 * The import process always fetches the items from the web.
 *
 *
 *
 *
 * Options, flags, parameters
 * -----------
 * - -f: force reimport.
 *
 *      - If this flag is set, the uni-tool will force the reimport (i.e. re-downloading) of the planet, even if there is no newer version.
 *          This can be useful for testing purposes for instance.
 *          If the planet has dependencies, the dependencies will also be reimported forcibly.
 *
 *
 *
 */
class StoreCommand extends ReimportCommand
{


    /**
     * Builds the StoreCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->importMode = "store";
        $this->bootAvailable = false;
    }
}