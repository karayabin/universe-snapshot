<?php


namespace Ling\Uni2\Command;


/**
 * The ImportAllCommand class.
 *
 * Same as the @object(ImportCommand) command,
 * but applies for all planets in the current application.
 *
 *
 * Options, flags, parameters
 * -----------
 * - -f: force import.
 *
 *      - If this flag is set, the uni-tool will force the reimport of the planets, even if they already exist in the application.
 *          This can be useful for testing purposes for instance.
 *          If the planets have dependencies, the dependencies will also be reimported forcibly.
 *
 * - -f: do not reboot.
 *
 *      By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
 *      If this option is set, the booting will not occur.
 *
 *
 */
class ImportAllCommand extends ReimportAllCommand
{

    /**
     * Builds the ImportAllCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->importMode = "import";
    }
}