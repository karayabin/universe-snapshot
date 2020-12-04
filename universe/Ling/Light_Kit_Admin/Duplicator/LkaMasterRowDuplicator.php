<?php


namespace Ling\Light_Kit_Admin\Duplicator;

use Ling\Bat\ClassTool;
use Ling\Light_DatabaseUtils\Util\RowDuplicator;
use Ling\UniverseTools\PlanetTool;

/**
 * The LkaMasterRowDuplicator class.
 */
class LkaMasterRowDuplicator extends RowDuplicator
{

    /**
     * This property holds the customDuplicator for this instance.
     * @var LkaRowDuplicatorHooksInterface
     */
    private $customDuplicator;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Duplicates the rows identified by the given rics, for the given plugin and table.
     *
     * Available options are:
     * - deep: bool=false, whether to perform a deep duplicate.
     *      Note: if you override our default behaviour, this option might not be interpreted (i.e. it's up to the overriding class to interpret it).
     *
     *
     *
     * You can either override the duplicator entirely, or hook into our default duplicator, using conventions based on the
     * planetId.
     *
     * For more details, see the @page(Light_Kit_Admin duplicate row conception notes).
     *
     *
     * @param string $planetId
     * @param string $table
     * @param array $rics
     * @param array $options
     */
    public function duplicateRows(string $planetId, string $table, array $rics, array $options = [])
    {

        // reset internal variables
        $this->customDuplicator = null;

        list($galaxy, $planet) = PlanetTool::extractPlanetId($planetId);
        $compressedName = PlanetTool::getTightPlanetName($planet);
        $classPath = "$galaxy\\$planet\\Light_Kit_Admin\\Duplicator\\${compressedName}Duplicator";

        $customDuplicator = ClassTool::instantiate($classPath);
        if (false !== $customDuplicator) {

            if ($customDuplicator instanceof LkaRowDuplicatorInterface) {
                $customDuplicator->duplicate($table, $rics, $options);
                return;
            } elseif ($customDuplicator instanceof LkaRowDuplicatorHooksInterface) {
                $this->customDuplicator = $customDuplicator;
            }
        }

        $this->duplicate($table, $rics, $options);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onInsertAfter(string $mainTable, string $table, array $oldRow, array $newRow, $lastInsertId = null)
    {
        if (null !== $this->customDuplicator) {
            $this->customDuplicator->onInsertAfter($mainTable, $table, $oldRow, $newRow, $lastInsertId);
        }
    }


}