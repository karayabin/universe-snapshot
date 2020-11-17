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
        az('here', $planetId);
        PlanetTool::getTightPlanetName()
        $classPath = str_replace('/', '\\', $planetId) . "\\Light_Kit_Admin\\Duplicator\\";
        $customDuplicator = ClassTool::instantiate($classPath);
        if(false === $customDuplicator){

        }
        $this->duplicate($table, $rics, $options);
    }


}