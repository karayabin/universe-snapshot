<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\FilesHelper;

/**
 * The PushDatabaseCommand class.
 *
 * This command pushes the current database(s) from the local machine to the remote.
 *
 *
 * It's a combination of the following commands:
 * - backup-db: creates a temporary backup of the local database
 * - push-backup-db: uploads the local backup to the remote machine
 * - restore-backup-db -r: restore the remote database from the uploaded backup
 *
 * By default, it copies the last database(s) for every database identifier.
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
class PushDatabaseCommand extends DeployGenericCommand
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
        // STEP 1: CREATE LOCAL BACKUP
        //--------------------------------------------
        $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
        H::info(H::i($indentLevel) . "Step <$stepFormat> 1/4 </$stepFormat>: Create the local backup." . PHP_EOL, $output);
        $cmd = "deploy -x backup-db p=\"$projectIdentifier\" name=_temporary.sql $sDb indent=" . ($indentLevel + 1);
        if (true === ConsoleTool::passThru($cmd)) {
            H::success(H::i($indentLevel) . "The local backup was successfully created." . PHP_EOL, $output);


            //--------------------------------------------
            // STEP 2: UPLOAD BACKUP TO REMOTE MACHINE
            //--------------------------------------------
            $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
            H::info(H::i($indentLevel) . "Step <$stepFormat> 2/4 </$stepFormat>: Export the local backup to the remote machine." . PHP_EOL, $output);
            $cmd = "deploy -x push-backup-db p=\"$projectIdentifier\" $sDb names=_temporary.sql indent=" . ($indentLevel + 1);
            if (true === ConsoleTool::passThru($cmd)) {
                H::success(H::i($indentLevel) . "The local backup was successfully exported." . PHP_EOL, $output);

                //--------------------------------------------
                // STEP 3: RESTORE BACKUP ON REMOTE MACHINE
                //--------------------------------------------
                H::info(H::i($indentLevel) . "Step <$stepFormat> 3/4 </$stepFormat>: Restore the backup on the remote machine." . PHP_EOL, $output);

                $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
                $sKeep = (true === $keepFlag) ? '-k' : '';
                $sSecure = (true === $secureFlag) ? '-s' : '';
                $cmd = "deploy -x restore-backup-db p=\"$projectIdentifier\" -r $sDb $sKeep $sSecure name=_temporary.sql indent=" . ($indentLevel + 1);
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
                H::error(H::i($indentLevel) . "The local backup couldn't be exported." . PHP_EOL, $output);
            }


        } else {
            H::error(H::i($indentLevel) . "The local backup couldn't be created." . PHP_EOL, $output);
        }


        return 2;
    }
}