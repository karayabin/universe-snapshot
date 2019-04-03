<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\FilesHelper;

/**
 * The FetchDatabaseCommand class.
 *
 * This command copies the remote database to the local machine.
 *
 * It's a combination of the following commands:
 * - backup-db -r: creates a temporary backup of the remote database
 * - fetch-backup-db: repatriates the remote backup to the local machine
 * - restore-backup-db: restore the local database from the downloaded backup
 *
 * By default, it copies the last database for every database identifier.
 * To restrict the database identifiers to a subset of your choice, use the **db** option.
 *
 *
 *
 * Options, flags
 * ---------------
 * - ?db=$identifiers: the comma separated list of database identifiers to process.
 * - -s: secure flag. If set, this command will prompt the user for required database password(s).
 * - -k: keep flag. If set, this command will not drop the database before restoring the backup.
 *
 */
class FetchDatabaseCommand extends DeployGenericCommand
{
    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        $dbOption = $input->getOption('db');
        $secureFlag = $input->hasFlag('s');
        $keepFlag = $input->hasFlag('k');
        $projectIdentifier = $this->application->getProjectIdentifier();


        $stepFormat = 'white:bgCyan';

        $conf = $this->application->getProjectConf();
        $applicationDir = $conf['root_dir'];
        $remoteRootDir = $conf['remote_root_dir'];
        $localBackupDir = $applicationDir . "/.deploy/backup-db";
        $remoteBackupDir = $remoteRootDir . "/.deploy/backup-db";


        //--------------------------------------------
        // STEP 1: CREATE REMOTE BACKUP
        //--------------------------------------------
        $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
        H::info(H::i($indentLevel) . "Step <$stepFormat> 1/4 </$stepFormat>: Create the remote backup." . PHP_EOL, $output);
        $cmd = "deploy -x backup-db p=\"$projectIdentifier\" -r name=_temporary.sql $sDb indent=" . ($indentLevel + 1);
        if (true === ConsoleTool::passThru($cmd)) {
            H::success(H::i($indentLevel) . "The remote backup was successfully created." . PHP_EOL, $output);


            //--------------------------------------------
            // STEP 2: REPATRIATE BACKUP TO LOCAL MACHINE
            //--------------------------------------------
            $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
            H::info(H::i($indentLevel) . "Step <$stepFormat> 2/4 </$stepFormat>: Repatriate the remote backup to the local machine." . PHP_EOL, $output);
            $cmd = "deploy -x fetch-backup-db p=\"$projectIdentifier\" $sDb names=_temporary.sql indent=" . ($indentLevel + 1);
            if (true === ConsoleTool::passThru($cmd)) {
                H::success(H::i($indentLevel) . "The remote backup was successfully repatriated." . PHP_EOL, $output);


                //--------------------------------------------
                // STEP 3: RESTORE BACKUP ON LOCAL MACHINE
                //--------------------------------------------
                H::info(H::i($indentLevel) . "Step <$stepFormat> 3/4 </$stepFormat>: Restore the backup on the local machine." . PHP_EOL, $output);

                $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
                $sKeep = (true === $keepFlag) ? '-k' : '';
                $sSecure = (true === $secureFlag) ? '-s' : '';
                $cmd = "deploy -x restore-backup-db p=\"$projectIdentifier\" $sDb $sKeep $sSecure name=_temporary.sql indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($cmd)) {
                    H::success(H::i($indentLevel) . "The remote backup was successfully restored." . PHP_EOL, $output);


                    //--------------------------------------------
                    // STEP 4: CLEANING TEMPORARY SQL FILES
                    //--------------------------------------------
                    H::info(H::i($indentLevel) . "Step <$stepFormat> 4/4 </$stepFormat>: Cleaning temporary sql files." . PHP_EOL, $output);

                    FilesHelper::removeFilesByName($localBackupDir, '_temporary.sql');
                    $cmd = "deploy -x remove-files-by-name p=\"$projectIdentifier\" -r dir=\"$remoteBackupDir\" names=_temporary.sql indent=" . ($indentLevel + 1);
                    if (true === ConsoleTool::passThru($cmd)) {
                        H::success(H::i($indentLevel) . "The temporary sql files were successfully removed." . PHP_EOL, $output);
                        return 0;
                    } else {
                        H::error(H::i($indentLevel) . "The temporary sql files couldn't be removed." . PHP_EOL, $output);
                    }


                } else {
                    H::error(H::i($indentLevel) . "The remote backup couldn't be restored." . PHP_EOL, $output);
                }


            } else {
                H::error(H::i($indentLevel) . "The remote backup couldn't be repatriated." . PHP_EOL, $output);
            }


        } else {
            H::error(H::i($indentLevel) . "The remote backup couldn't be created." . PHP_EOL, $output);
        }


        return 2;
    }
}