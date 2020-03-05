<?php


namespace Ling\Light_UserRowRestriction\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\EventHandler\LightDatabaseEventHandlerInterface;
use Ling\Light_Database\Helper\LightDatabaseHelper;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\Light_UserRowRestriction\Exception\LightUserRowRestrictionException;
use Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface;
use Ling\SqlWizard\Tool\SqlWizardGeneralTool;

/**
 * The LightUserRowRestrictionService class.
 */
class LightUserRowRestrictionService implements LightDatabaseEventHandlerInterface
{

    /**
     * The inactive mode, which is the default mode. See the $mode property for more details.
     */
    const MODE_INACTIVE = 0;


    /**
     * The strict mode. See the $mode property for more details.
     */
    const MODE_STRICT = 1;

    /**
     * The permissive mode. See the $mode property for more details.
     */
    const MODE_PERMISSIVE = 2;


    /**
     * This property holds the mode for this instance.
     * See @page(the Light_UserRowRestriction conception notes, service mode section) for more details.
     * @var int = 0
     */
    public static $mode = self::MODE_INACTIVE;


    /**
     * This property holds the $prefix2RowRestrictionsHandlers for this instance.
     * An array of table prefix => RowRestrictionHandlerInterface.
     * Only one handler is allowed by prefix for now (let plugins figure that out).
     *
     * @var RowRestrictionHandlerInterface[]
     */
    protected $prefix2RowRestrictionsHandlers;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightUserRowRestrictionService instance.
     */
    public function __construct()
    {
        $this->prefix2RowRestrictionsHandlers = [];
        $this->container = null;
    }


    /**
     * Registers a row restriction handler, and assigns it to the given table prefix.
     *
     * @param string $tablePrefix
     * @param RowRestrictionHandlerInterface $handler
     */
    public function registerRowRestrictionHandlerByTablePrefix(string $tablePrefix, RowRestrictionHandlerInterface $handler)
    {
        $this->prefix2RowRestrictionsHandlers[$tablePrefix] = $handler;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function handle(string $eventName, bool $isSystemCall, ...$args)
    {
        /**
         * We don't treat system calls at all for now
         */
        if (true === $isSystemCall) {
            return;
        }

        if (self::MODE_INACTIVE === self::$mode) {
            return;
        }


        switch ($eventName) {
            case "insert.before":
                $type = "create";
                $table = $args[0];
                break;
            case "replace.before":
            case "update.before":
                $type = "update";
                $table = $args[0];
                break;
            case "delete.before":
                $type = "delete";
                $table = $args[0];
                break;
            case "fetch.before":
            case "fetchAll.before":
                $q = $args[0];
                $tables = LightDatabaseHelper::getTablesByQuery($q);

                /**
                 * For now assuming that the main table is the first one found.
                 */
                $table = array_shift($tables);
                $type = "read";
                break;
            default:
                throw new LightUserRowRestrictionException("Unknown eventName \"$eventName\".");
                break;
        }


        /**
         * For now my handlers only use table prefix (might change later when needed)
         */
        $prefix = SqlWizardGeneralTool::getTablePrefix($table);
        if (array_key_exists($prefix, $this->prefix2RowRestrictionsHandlers)) {


            /**
             * @var $manager LightUserManagerService
             */
            $manager = $this->container->get("user_manager");
            $user = $manager->getUser();

            $handler = $this->prefix2RowRestrictionsHandlers[$prefix];
            $handler->checkRestriction($user, $table, $type, ...$args);
        }
    }

}