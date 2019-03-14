<?php


namespace Ling\Uni2\Command;


/**
 * The StoreMapCommand class.
 *
 * Same as the @object(ReimportMapCommand) command,
 * but uses the @concept("store" import mode) instead.
 *
 *
 */
class StoreMapCommand extends ReimportMapCommand
{


    /**
     * Builds the StoreMapCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->importMode = "store";
        $this->bootAvailable = false;
    }
}