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
 * The CreateDatabaseCommand class.
 *
 * This command creates database(s) along with their user(s), based on the databases section of the @page(configuration file)
 * for the current project.
 *
 * This operation will require root privileges, and so you will be prompted for the password of the root user (of the database).
 *
 * By default, all databases listed in the configuration are created.
 * To create a single database, or a selected set of databases, use the **db** option.
 *
 *
 * Details: the database is first created, then the user, then all privileges are granted to that user on that database.
 * By default, if the database exists or if the user exists, they won't be overwritten.
 * However if the **-f** flag is set, the database and user will be deleted first and then recreated.
 *
 *
 *
 *
 * PROBLEMS THAT MIGHT HAPPEN
 * ----------------
 *
 * The whole error described below occurred in previous versions of this class, where I used the
 * "delete from mysql.user..." statement instead of the "drop user..." statement.
 * Now this problem is fixed, but I keep this error below as a reminder.
 *
 *
 * After playing for a while with this command, at some point it started to behave weirdly, and I've got the following
 * error (on mac: mysql  Ver 8.0.13 for osx10.12 on x86_64 (Homebrew)):
 *
 *      dp p=komin create-db
 *      ERROR 1410 (42000) at line 3: You are not allowed to create a user with GRANT
 *
 * Alternately, on the remote server I've got a similarly weird error (on ubuntu: mysql  Ver 14.14 Distrib 5.7.18, for Linux (x86_64) using  EditLine wrapper):
 *
 *      dp p=komin create-db -r
 *      ERROR 1133 (42000) at line 7: Can't find any matching row in the user table
 *
 *
 * That's a stupid error, since it worked just fine before, anyway...
 * The work around I find in this case was just to use the -f flag and it magically worked:
 *
 *      dp p=komin create-db -f     # for local site
 *      dp p=komin create-db -rf    # for remote
 *
 * After that, the first command started to work normally again.
 * I guess the -f option did some cleaning. Weird...
 *
 * Note: dp is an alias of deploy on my machine.
 *
 *
 * Options, flags
 * ------------
 * - ?db=$identifier: the identifier of the database(s) to create. It can also be a comma separated list of identifiers.
 *      Note: the identifier refers to a key in the **databases** section of the @page(configuration file).
 *
 * - -r: remote flag. If set, the command will operate on the remote rather than on the site.
 * - -f: force the recreation of the database(s) and user(s) by deleting them before re-creating them.
 *
 *
 */
class CreateDatabaseCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndentLevel();
        $dbOption = $input->getOption('db');
        $remoteFlag = $input->hasFlag('r');
        $forceFlag = $input->hasFlag('f');
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
                H::info(H::i($indentLevel) . "Calling <b>create-db</b> command on <b>remote</b>:" . PHP_EOL, $output);


                $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
                $sForce = (true === $forceFlag) ? '-f' : '';
                $cmd = "ssh -t $remoteSshConfigId deploy -x create-db $sForce $sDb conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                if(true===ConsoleTool::passThru($cmd)){
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
             * Algo: we first compute the statement containing creation of all databases,
             * then execute the whole statement at once.
             *
             * This is because we just want to be prompted with the password once.
             *
             */
            //--------------------------------------------
            // CHECK FOR ERRORS AND COLLECT INFO
            //--------------------------------------------
            $infoStatements = MysqlHelper::getDatabasesConfigurationInfo($databases, $databasesConf, $output, $indentLevel);
            if (false !== $infoStatements) {
                if ($infoStatements) {


                    H::info(H::i($indentLevel) . "Compiling sql statement:" . PHP_EOL, $output);
                    //--------------------------------------------
                    // COMPILING THE STATEMENT FIRST
                    //--------------------------------------------
                    $createStatements = [];

                    foreach ($infoStatements as $infoStatement) {
                        list($databaseIdentifier, $name, $user, $pass) = $infoStatement;

                        $escapedUser = str_replace("'", "\\'", $user);
                        $escapedPpassword = str_replace("'", "\\'", $pass);

                        H::info(H::i($indentLevel + 1) . "Creating database <b>$name</b> with user <b>$user</b>." . PHP_EOL, $output);
                        if (true === $forceFlag) {
                            $createStatements[] = <<<EEE
drop database if exists `$name`;
drop user if exists '$escapedUser'@'localhost';
EEE;
                        }

                        $createStatements[] = <<<EEE
create database if not exists `$name` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
create user if not exists '$escapedUser'@'localhost' identified by '$escapedPpassword';
grant all privileges on `$name`.* to '$escapedUser'@'localhost';
flush privileges;
EEE;

                    }


                    //--------------------------------------------
                    // EXECUTING COMPILED STATEMENT
                    //--------------------------------------------
                    H::info(H::i($indentLevel) . "Executing sql statement (this will require root privileges)." . PHP_EOL, $output);
                    $tmpFile = $applicationDir . "/.deploy/tmp.sql";
                    if (true === FileSystemTool::mkfile($tmpFile, implode(PHP_EOL, $createStatements))) {
                        $cmd = 'mysql -uroot -p < "' . $tmpFile . '"';
                        if (true === ConsoleTool::passThru($cmd)) {
                            H::success(H::i($indentLevel) . "The sql statement was successfully executed." . PHP_EOL, $output);
                            return 0;
                        } else {
                            H::error(H::i($indentLevel) . "The sql statement couldn't be executed properly." . PHP_EOL, $output);
                        }
                    } else {
                        H::error(H::i($indentLevel + 1) . "Could not create the temporary file containing sql statement." . PHP_EOL, $output);
                    }

                } else {
                    H::info(H::i($indentLevel) . "No database defined in the configuration file. Nothing to do." . PHP_EOL, $output);
                }
            }

        }
        return 2;
    }


}