<?php


namespace Ling\UniverseTools;

/**
 * The MachineUniverseTool class.
 */
class MachineUniverseTool
{


    /**
     * Returns the path to the [machine universe path](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#machine-universe).
     *
     *
     *
     * @return string
     */
    public static function getMachineUniversePath(): string
    {

        $confFile = "/usr/local/share/universe/Ling/UniverseTools/machine-universe-path.txt";
        if (true === file_exists($confFile)) {
            return trim(file_get_contents($confFile));
        }
        return "/usr/local/share/universe";
    }
}