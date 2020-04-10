<?php


namespace Ling\Light_UserRowRestriction\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Helper\LightDatabaseHelper;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\Light_UserRowRestriction\Exception\RowRestrictionViolationException;
use Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface;
use Ling\SqlWizard\Tool\SqlWizardGeneralTool;

/**
 * The LightUserRowRestrictionService class.
 */
class LightUserRowRestrictionService
{


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
     * Checks that the current user is granted to do the crud operation (eventName argument).
     * If that's not the case, it throws a RowRestrictionViolationException.
     *
     * @param string $eventName
     * @param mixed ...$args
     * @throws RowRestrictionViolationException
     */
    public function checkRestrictions(string $eventName, ...$args)
    {
        try {
            switch ($eventName) {
                case "insert":
                case "replace":
                case "delete":
                case "update":
                    $table = $args[0];
                    break;
                case "fetch":
                case "fetchAll":
                    $q = $args[0];
                    $tables = LightDatabaseHelper::getTablesByQuery($q);

                    /**
                     * For now assuming that the main table is the first one found.
                     */
                    $table = array_shift($tables);
                    break;
                default:
                    throw new RowRestrictionViolationException("Light_UserRowRestriction: Unknown eventName \"$eventName\".");
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

                $handler->checkRestriction($user, ...$args);

            }
        } catch (\Exception $e) {
            $exc = new RowRestrictionViolationException($e->getMessage(), $e->getCode(), $e);
            throw $exc;

        }
    }

}