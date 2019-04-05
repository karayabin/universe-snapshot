<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\RemoteConfHelper;
use Ling\Deploy\Util\BackupFilesFetcherUtil;

/**
 * The AbstractBackupCommand class.
 *
 * A parent class for subclasses who need to create backup zip archives.
 *
 *
 */
abstract class AbstractBackupCommand extends DeployGenericCommand
{


    /**
     * This property holds the backupDirName for this instance.
     * @var string
     */
    protected $backupDirName;

    /**
     * This property holds the extension for this instance.
     * @var string
     */
    protected $extension;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->backupDirName = "backup-files";
        $this->extension = "zip";
    }


    /**
     * A hook executed once the zip archive is successfully created.
     *
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    abstract protected function onArchiveReady(InputInterface $input, OutputInterface $output);


    /**
     * Creates the backup zip archive, using the given parameters in the input,
     * and returns whether the zip creation was successful.
     * Also calls the onArchiveReady method if the zip creation was successful.
     *
     *
     * The archive is created by collecting all backups from the backup dir, then filtering them
     * using the following options:
     *
     * - the **names** option
     * - the **last** option
     *
     * If the **name** option is defined, the last option will be ignored.
     *
     * The **name** option allows you to specify the name(s) of the backups to archive.
     * The **last** option allows you to define the number of the non-named backups to archive.
     *
     *
     *
     *
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     * @throws \Ling\Bat\Exception\BatException
     * @throws \Ling\Deploy\Exception\DeployException
     */
    public function createArchive(InputInterface $input, OutputInterface $output)
    {

        /**
         * The technique used here:
         *
         * - we first create a zip archive on the local machine, containing all db backups to upload
         * - then we upload it on the remote machine and extract it
         *
         */
        $indentLevel = $this->application->getBaseIndentLevel();
        $nameOption = $input->getOption('names');
        $lastOption = $input->getOption('last');
        $confPath = $input->getOption("conf");


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }


        // hack me
        $applicationDir = $conf['root_dir'];


        $localBackupDir = $applicationDir . '/.deploy/' . $this->backupDirName;
        $localZipPath = $applicationDir . '/.deploy/' . $this->backupDirName . '.zip';


        //--------------------------------------------
        // COLLECTING FILES
        //--------------------------------------------
        $util = $this->getFetcherUtilInstance($input);
        $util->setBackupDir($localBackupDir);
        $util->setExtension($this->extension);
        if (null !== $nameOption) {
            $util->setNames($nameOption);
        }
        if (null !== $lastOption) {
            $util->setLast($lastOption);
        }
        $allFiles = $util->fetch();

        H::info(H::i($indentLevel) . "Collecting files to put in the archive:" . PHP_EOL, $output);
        $relPaths = [];
        $len = mb_strlen(realpath($localBackupDir));
        foreach ($allFiles as $file) {
            H::info(H::i($indentLevel + 1) . "- $file" . PHP_EOL, $output);
            $relPaths[] = mb_substr($file, $len + 1);
        }


        //--------------------------------------------
        // CREATING ARCHIVE
        //--------------------------------------------
        H::info(H::i($indentLevel) . "Creating zip archive in <b>$localZipPath</b>...", $output);
        $errors = [];
        $failed = [];


        if (true === ZipTool::zipByPaths($localZipPath, $localBackupDir, $relPaths, $errors, $failed)) {
            $output->write('<success>ok</success>' . PHP_EOL);
            $this->onArchiveReady($input, $output);
            return true;


        } else {
            $output->write('<error>oops</error>' . PHP_EOL);
            if ($errors) {
                H::error(H::i($indentLevel + 1) . "The following errors occurred:" . PHP_EOL, $output);
                foreach ($errors as $error) {
                    H::error(H::i($indentLevel + 2) . "- $error" . PHP_EOL, $output);
                }
            }

            if ($failed) {
                H::error(H::i($indentLevel + 1) . "The following files couldn't be added to the archive:" . PHP_EOL, $output);
                foreach ($failed as $file) {
                    H::error(H::i($indentLevel + 2) . "- $file" . PHP_EOL, $output);
                }
            }

        }


        return false;
    }


    /**
     * Returns the FetcherUtil instance to use by this command.
     *
     * @param InputInterface $input
     * @return BackupFilesFetcherUtil
     */
    protected function getFetcherUtilInstance(InputInterface $input)
    {
        return new BackupFilesFetcherUtil();
    }
}