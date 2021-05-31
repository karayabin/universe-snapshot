<?php


namespace Ling\Light_PlanetInstaller\Util;


use Ling\BabyYaml\BabyYamlUtil;

/**
 * The TimConflictsReader class.
 *
 * This class helps read conflicts that might occur during the creation of a theoretical import map.
 * See the @page(Light_PlanetInstaller conception notes) for more info.
 *
 *
 */
class TimConflictsReader
{


    /**
     * This property holds the conflicts for this instance.
     * @var array
     */
    private array $conflicts;

    /**
     * This property holds the conflictsPath for this instance.
     * @var string
     */
    private string $conflictsPath;


    /**
     * Sets the conflictsPath.
     *
     * @param string $conflictsPath
     */
    public function init(string $conflictsPath)
    {
        $this->conflictsPath = $conflictsPath;
        $this->conflicts = BabyYamlUtil::readFile($conflictsPath, [
            'numbersAsString' => true,
        ]);
    }


    /**
     * Returns an array of planetDotName => number of conflicts it is involved in.
     * @return array
     */
    public function getStats(): array
    {
        $ret = [];
        foreach ($this->conflicts as $conflict) {
            list($planetDotName, $version, $parentChain) = $conflict;
            if (false === array_key_exists($planetDotName, $ret)) {
                $ret[$planetDotName] = 0;
            }
            $ret[$planetDotName]++;
        }
        return $ret;
    }


    /**
     * Returns the number of conflicts found.
     * @return int
     */
    public function countConflicts(): int
    {
        return count($this->conflicts);
    }

    /**
     * Returns the conflictsPath of this instance.
     *
     * @return string
     */
    public function getConflictsPath(): string
    {
        return $this->conflictsPath;
    }

    /**
     * Returns the conflicts of this instance.
     *
     * @return array
     */
    public function getConflicts(): array
    {
        return $this->conflicts;
    }


}