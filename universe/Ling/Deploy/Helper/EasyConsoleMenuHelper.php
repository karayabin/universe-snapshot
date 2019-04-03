<?php


namespace Ling\Deploy\Helper;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\Bat\FileSystemTool;
use Ling\Deploy\Exception\DeployException;

/**
 * The EasyConsoleMenuHelper class.
 */
class EasyConsoleMenuHelper
{


    /**
     * Returns the projects names list.
     *
     * @param string|null $deployConfPath
     * @return array
     * @throws DeployException
     */
    public static function getProjectsList(string $deployConfPath = null)
    {
        if (null === $deployConfPath) {
            $deployConfPath = FileSystemTool::resolveTilde("~/.deploy/deploy.conf.byml");
        }
        if (is_file($deployConfPath)) {
            $conf = BabyYamlUtil::readFile($deployConfPath);
            $projects = $conf['projects'] ?? [];
            return array_keys($projects);
        } else {
            throw new DeployException("This is not a file: $deployConfPath");
        }
    }


    /**
     * Returns the database identifiers for the given project.
     *
     * @param string $project
     * @param string|null $deployConfPath
     * @return array
     * @throws DeployException
     */
    public static function getDatabaseIdentifiers(string $project, string $deployConfPath = null)
    {
        if (null === $deployConfPath) {
            $deployConfPath = FileSystemTool::resolveTilde("~/.deploy/deploy.conf.byml");
        }
        if (is_file($deployConfPath)) {
            $conf = BabyYamlUtil::readFile($deployConfPath);
            $found = false;
            $projectConf = BDotTool::getDotValue("projects.$project", $conf, [], $found);
            if (true === $found) {
                $databases = $projectConf['databases'] ?? [];
                if ($databases) {
                    return array_keys($databases);
                } else {
                    throw new DeployException("No database defined for project $project in $deployConfPath.");
                }
            } else {
                throw new DeployException("Project not found: $project in $deployConfPath.");
            }
        } else {
            throw new DeployException("This is not a file: $deployConfPath.");
        }
    }


    public static function getFilesBackupList(bool $isRemote, string $project, string $deployConfPath = null)
    {
        if (null === $deployConfPath) {
            $deployConfPath = FileSystemTool::resolveTilde("~/.deploy/deploy.conf.byml");
        }
        if (is_file($deployConfPath)) {
            $conf = BabyYamlUtil::readFile($deployConfPath);
            $found = false;
            $projectConf = BDotTool::getDotValue("projects.$project", $conf, [], $found);
            if (true === $found) {

                $ret = [];
                $rootDir = $projectConf['root_dir'];
                $backupDir = $rootDir . "/.deploy/backup-files";
                if (is_dir($backupDir)) {
                    BackupHelper::getBackupFilesList();
                }
                return $ret;
            } else {
                throw new DeployException("Project not found: $project in $deployConfPath.");
            }
        } else {
            throw new DeployException("This is not a file: $deployConfPath.");
        }
    }
}