<?php


namespace Ling\Deploy\Util;


use Ling\Deploy\Exception\DeployException;
use Ling\Deploy\Helper\OptionHelper;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The BackupFilesFetcherUtil class.
 * This class helps retrieving backup files, depending on some criteria passed by the user.
 *
 * The possible criteria are:
 *
 * - names: array. An array of backup names. If set, the resulting collection will only contain the backup files which name
 *              match those of the array. This criteria has precedence over the **last** criteria.
 * - last: int>0.  The max number of (most recent) non-named backups to return.
 *              If set, the resulting collection will contain the n most recent non-named backups (with n=last).
 *              This criterion is only effective if the **names** criterion is not set.
 *
 *
 *
 * For more info about backup files, see the @page(backup files) page.
 *
 *
 */
class BackupFilesFetcherUtil
{


    /**
     * This property holds the optional last number for this instance.
     * @var int|null
     */
    protected $last;

    /**
     * This property holds the optional names array for this instance.
     * @var array|null
     */
    protected $names;


    /**
     * This property holds the backupDir for this instance.
     * @var string
     */
    protected $backupDir;


    /**
     * This property holds the extension for this instance.
     * @var string
     */
    protected $extension;


    /**
     * Builds the BackupFilesFetcherUtil instance.
     */
    public function __construct()
    {
        $this->last = null;
        $this->names = null;
        $this->backupDir = null;
        $this->extension = null;
    }

    /**
     * Sets the last option.
     *
     * @param int $last
     * @throws DeployException
     */
    public function setLast(int $last)
    {
        if ($last < 1) {
            throw new DeployException("The last parameter must be greater than 0, $last passed.");
        }
        $this->last = $last;
    }

    /**
     * Sets the names, either by using a comma separated list of names,
     * or by using an array.
     *
     * @param array|string $names
     */
    public function setNames($names)
    {
        if (is_string($names)) {
            $names = OptionHelper::csvToArray($names);
        }
        $this->names = $names;
    }

    /**
     * Sets the backupDir.
     *
     * @param string $backupDir
     */
    public function setBackupDir(string $backupDir)
    {
        $this->backupDir = $backupDir;
    }

    /**
     * Sets the extension.
     *
     * @param string $extension
     */
    public function setExtension(string $extension)
    {
        $this->extension = $extension;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the array of backup files matching this instance's criteria.
     *
     * @return array
     * An array of absolute paths.
     *
     * @throws DeployException
     */
    public function fetch()
    {
        if (null !== $this->backupDir) {
            if (null !== $this->extension) {

                $allFiles = [];

                if (is_dir($this->backupDir)) {


                    $allFiles = YorgDirScannerTool::getFilesWithExtension($this->backupDir, $this->extension, false, true);
                    $this->onAllFilesReady($allFiles);


                    //--------------------------------------------
                    // NAMES CRITERION
                    //--------------------------------------------
                    if (null !== $this->names) {
                        $names = $this->names;
                        $len = strlen($this->extension);
                        $names = array_map(function ($v) use ($len) {
                            if ('.' . $this->extension !== substr($v, (1 + $len) * -1)) {
                                $v .= "." . $this->extension;
                            }
                            return $v;
                        }, $names);
                        $allFiles = $this->filterWithNames($allFiles, $names);
                    }
                    //--------------------------------------------
                    // LAST CRITERION
                    //--------------------------------------------
                    elseif (null !== $this->last) {
                        // collecting non-named files
                        $nonNamed = [];
                        foreach ($allFiles as $file) {
                            $baseName = basename($file);
                            if (preg_match('![0-9]{4}-[0-9]{2}-[0-9]{2}__[0-9]{2}-[0-9]{2}-[0-9]{2}\.' . $this->extension . '!', $baseName, $match)) {
                                $nonNamed[$match[0] . "-" . $file] = $file;
                            }
                        }
                        krsort($nonNamed);


                        // taking the x last non-named files
                        $allFiles = $this->filterWithLast($nonNamed, $this->last);
                    }
                }
                return $allFiles;

            } else {
                throw new DeployException("Extension dir not set!");
            }
        } else {
            throw new DeployException("Backup dir not set!");
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the array of files matching the given names.
     *
     *
     *
     * @param array $allFiles
     * @param array $names
     * @return array
     */
    protected function filterWithNames(array $allFiles, array $names)
    {
        return array_filter($allFiles, function ($v) use ($names) {
            $baseName = basename($v);
            return (in_array($baseName, $names, true));
        });
    }


    /**
     * Returns the array containing at most the $last most recent non-named backups.
     *
     * @param array $nonNamed
     * @param int $last
     * @return array
     */
    protected function filterWithLast(array $nonNamed, int $last)
    {
        return array_slice($nonNamed, 0, $last);
    }


    /**
     * Hook to allow subclasses to filter the files array before default criteria are applied.
     *
     * @param array $files
     * @overrideMe
     */
    protected function onAllFilesReady(array &$files)
    {

    }
}