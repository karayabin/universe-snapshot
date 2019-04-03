<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\MysqlHelper;
use Ling\Deploy\Helper\RemoteConfHelper;

/**
 * The DropDatabaseCommand class.
 *
 * This command drops the database(s) of the project.
 *
 *
 * By default, all databases listed in the @page(configuration of the project) are dropped.
 * To drop a single database, or a selected set of databases, use the **db** option.
 * By default, dropping a database won't prompt you for the password (it's passed automatically using
 * the mysqldump --defaults-extra-file option. See more details about this technique here:
 * https://stackoverflow.com/questions/20751352/suppress-warning-messages-using-mysql-from-within-terminal-but-password-written/22933056#22933056
 *
 * If you want to type the passwords manually, use the **-s** flag, in which case you will be prompted for a password
 * for every database that you want to drop.
 *
 *
 *
 *
 *
 * By default, only the database is dropped. To also drop the user along with the database, use the **-u** flag.
 * The operation of dropping an user will require root privileges,
 * and so you will be prompted for the password of the root user (of the database).
 *
 *
 *
 *
 * Options, flags
 * ------------
 * - ?db=$identifier: the identifier of the database(s) to drop. It can also be a comma separated list of identifiers.
 *      Note: the identifier refers to a key in the **databases** section of the @page(configuration file).
 *
 * - -r: remote flag. If set, the command will operate on the remote rather than on the site.
 * - -u: user flag. If set, the command will also drop the user.
 * - -s: secure flag. If set, this command will prompt the user for required database password(s).
 *
 *
 */
class DropDatabaseCommand extends DeployGenericCommand
{
    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndentLevel();
        $dbOption = $input->getOption('db');
        $remoteFlag = $input->hasFlag('r');
        $userFlag = $input->hasFlag('u');
        $secureFlag = $input->hasFlag('s');
        $confPath = $input->getOption("conf");


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }


        $applicationDir = $conf['root_dir'];
        $databasesConf = $conf["databases"] ?? [];


        if (true === $remoteFlag) {


            $remoteSshConfigId = $conf['ssh_config_id'];
            $remoteRootDir = $conf['remote_root_dir'];
            $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
            $appDir = $conf['root_dir'];
            if (true === RemoteConfHelper::pushConf([
                    'root_dir' => $remoteRootDir,
                    'databases' => $databasesConf,
                ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                H::info(H::i($indentLevel) . "Calling <b>drop-db</b> command on <b>remote</b>:" . PHP_EOL, $output);

                $sSecure = (true === $secureFlag) ? '-s' : '';
                $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
                $sUser = (true === $userFlag) ? '-u' : '';
                $cmd = "ssh -t $remoteSshConfigId deploy -x drop-db $sSecure $sUser $sDb conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($cmd)) {
                    return 0;
                }
            }


        } else {


            //--------------------------------------------
            // WHAT DATABASES ARE WE OPERATING ON?
            //--------------------------------------------
            if (null !== $dbOption) {
                $databases = array_map(function ($v) {
                    return trim($v);
                }, explode(',', $dbOption));
            } else {
                $databases = array_keys($databasesConf);
            }


            /**
             * Algo:
             *
             * if the -u flag is set:
             *      we first compute the statement containing drop of all users,
             *      then execute the whole statement at once.
             *      This is because we just want to be prompted with the password once.
             *
             *
             * For the database part, we can just run the statements one after the other.
             *
             */
            //--------------------------------------------
            // CHECK FOR ERRORS AND COLLECT INFO
            //--------------------------------------------
            $infoStatements = MysqlHelper::getDatabasesConfigurationInfo($databases, $databasesConf, $output, $indentLevel);
            if (false !== $infoStatements) {

                if ($infoStatements) {


                    $dropUserStatements = [];
                    $usersList = [];

                    //--------------------------------------------
                    // DROPPING DATABASES, one by one
                    //--------------------------------------------
                    foreach ($infoStatements as $infoStatement) {
                        list($databaseIdentifier, $name, $user, $pass) = $infoStatement;


                        if (false === $secureFlag) {


                            /**
                             * https://stackoverflow.com/questions/20751352/suppress-warning-messages-using-mysql-from-within-terminal-but-password-written/22933056#22933056
                             */
                            $tmpConfPath = $applicationDir . "/.deploy/tmp-conf.cnf";
                            $tmpConfContent = <<<EEE
[client]
user = $user
password = $pass
host = localhost
EEE;
                            FileSystemTool::mkfile($tmpConfPath, $tmpConfContent);
                            $cmd = 'mysql --defaults-extra-file="' . $tmpConfPath . '" -e "drop database if exists ' . $name . ';"';
                        } else {
                            $cmd = 'mysql -u' . $user . ' -p  -e "drop database if exists ' . $name . ';"';
                        }


                        H::info(H::i($indentLevel) . "Dropping database <b>$name</b>." . PHP_EOL, $output);

                        if (true === ConsoleTool::passThru($cmd)) {
                            H::success(H::i($indentLevel) . "The database was successfully dropped." . PHP_EOL, $output);
                        } else {
                            H::error(H::i($indentLevel) . "The database couldn't be dropped." . PHP_EOL, $output);
                        }


                        if (false === $secureFlag) {
                            FileSystemTool::remove($tmpConfPath);
                        }

                        $escapedUser = str_replace("'", "\\'", $user);
                        $dropUserStatements[] = "drop user if exists '$escapedUser'@'localhost';";
                        $usersList[] = $user;
                    }


                    //--------------------------------------------
                    // NOW EXECUTING THE COMPILED DROP USER STATEMENT
                    //--------------------------------------------
                    if ($userFlag && $dropUserStatements) {


                        $usersList = array_unique($usersList);

                        $dropUsersSqlFile = $applicationDir . "/.deploy/tmp.sql";
                        FileSystemTool::mkfile($dropUsersSqlFile, implode(PHP_EOL, $dropUserStatements));
                        $cmd = 'mysql -uroot -p < "' . $dropUsersSqlFile . '"';
                        H::info(H::i($indentLevel) . "Dropping users <b>" . implode('</b>, <b>', $usersList) . "</b>. This operation requires root database password." . PHP_EOL, $output);
                        if (true === ConsoleTool::passThru($cmd)) {
                            H::success(H::i($indentLevel) . "The user(s) were successfully dropped." . PHP_EOL, $output);
                            return 0;
                        } else {
                            H::error(H::i($indentLevel) . "The user(s) couldn't be dropped." . PHP_EOL, $output);
                        }
                    }
                } else {
                    H::info(H::i($indentLevel) . "No database defined in the configuration file. Nothing to do." . PHP_EOL, $output);
                }
            }

        }
        return 2;
    }


}