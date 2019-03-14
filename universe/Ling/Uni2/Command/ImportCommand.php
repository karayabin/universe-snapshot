<?php


namespace Ling\Uni2\Command;


/**
 * The ImportCommand class.
 *
 * This class implements the import command defined in the @page(uni-tool upgrade system document).
 *
 *
 * This command will import a planet only if either of the following cases is true:
 *
 * - the planet directory does not exist yet in the application
 * - the force flag (-f) is set to true
 *
 * The same applies recursively to the planet dependencies (if any).
 *
 * Note: non-planet items behave differently: they are only imported if their directory doesn't exist yet in the universe-dependencies directory.
 *
 *
 *
 * The import process is the same for all items:
 * - first try to fetch the item (planet or non-planet) from the local server (much faster)
 * - if the local server doesn't contain the item, then fetch the item on the web. In case of success, create a local server copy for the next time.
 *
 *
 *
 *
 * Options, flags, parameters
 * -----------
 * - -f: force import.
 *
 *      - If this flag is set, the uni-tool will force the reimport of the planet, even if it already exists in the application.
 *          This can be useful for testing purposes for instance.
 *          If the planet has dependencies, the dependencies will also be reimported forcibly.
 *
 * - -f: do not reboot.
 *
 *      By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
 *      If this option is set, the booting will not occur.
 *
 */
class ImportCommand extends ReimportCommand
{

    /**
     * Builds the ImportCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->importMode = "import";
    }

}