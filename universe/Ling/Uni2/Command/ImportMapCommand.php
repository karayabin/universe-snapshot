<?php


namespace Ling\Uni2\Command;


/**
 * The ImportMapCommand class.
 *
 * Same as the @object(ReimportMapCommand) command,
 * but uses the @concept("import" import mode) instead.
 *
 *
 */
class ImportMapCommand extends ReimportMapCommand
{


    /**
     * Builds the ImportMapCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->importMode = "import";
    }
}