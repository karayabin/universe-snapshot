<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\ErrorSummary\ErrorSummary;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\Util\ImportUtil;


/**
 * The ImportUniverseCommand class.
 *
 * This command imports the whole universe.
 *
 * The same algorithm as the @object(import command) is used.
 * The universe's planets are found from the @page(local dependency master file).
 *
 *
 *
 */
class ImportUniverseCommand extends ReimportUniverseCommand
{
    /**
     * Builds the ImportUniverseCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->importMode = "import";
    }
}