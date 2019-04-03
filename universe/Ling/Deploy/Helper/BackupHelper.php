<?php


namespace Ling\Deploy\Helper;


use Ling\Bat\FileSystemTool;
use Ling\Deploy\Exception\DeployException;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The BackupHelper class.
 */
class BackupHelper
{


    /**
     * Returns an array of named and non-named backups for the given $backupDir.
     *
     * A named backup is a backup which name was given explicitly by the user.
     * A non-named backup is a backup automatically created by the deploy system; it is based on the datetime
     * and look like this:
     *
     * ```txt
     * 2019-03-26__08-49-17.$extension
     * ```
     *
     * The non-named backups are ordered from the most recent to the oldest.
     *
     * The returned array has the following structure:
     *
     * - 0: array of named backup file paths
     * - 1: array of ordered non-named backup file paths
     *
     *
     *
     * @param string $backupDir
     * @param string $extension
     * @return array
     * @throws DeployException
     */
    public static function getNamedNonNamedBackups(string $backupDir, string $extension)
    {

        if (is_dir($backupDir)) {

            $named = [];
            $nonNamed = [];

            $files = YorgDirScannerTool::getFilesWithExtension($backupDir, $extension, false, true);
            foreach ($files as $file) {
                $baseName = basename($file);
                if (preg_match('![0-9]{4}-[0-9]{2}-[0-9]{2}__[0-9]{2}-[0-9]{2}-[0-9]{2}\.' . $extension . '!', $baseName, $match)) {
                    $nonNamed[] = $file;
                } else {
                    $named[] = $file;
                }
            }

            rsort($nonNamed);

            return [
                $named,
                $nonNamed,
            ];
        } else {
            throw new DeployException("Backup dir not found: $backupDir");
        }
    }
}