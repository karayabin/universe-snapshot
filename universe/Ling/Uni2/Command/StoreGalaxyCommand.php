<?php


namespace Ling\Uni2\Command;


/**
 * The StoreGalaxyCommand class.
 *
 * This command reimports a whole galaxy to the local server.
 *
 * The name of the galaxy to import is passed as the parameter of the command line.
 *
 *
 * The same algorithm as the @object(store command) is used.
 * The galaxy planets are found from the @page(local dependency master file).
 *
 *
 *
 */
class StoreGalaxyCommand extends ReimportGalaxyCommand
{


    /**
     * Builds the StoreGalaxyCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->importMode = "store";
        $this->bootAvailable = false;
    }
}