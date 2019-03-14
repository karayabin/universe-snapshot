<?php


namespace Ling\Uni2\Command;


/**
 * The ImportGalaxyCommand class.
 *
 * This command imports a whole galaxy.
 * The name of the galaxy to import is passed as the parameter of the command line.
 *
 * The same algorithm as the @object(import command) is used.
 * The galaxy planets are found from the @page(local dependency master file).
 *
 *
 *
 */
class ImportGalaxyCommand extends ReimportGalaxyCommand
{


    /**
     * Builds the ImportGalaxyCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->importMode = "import";
    }
}