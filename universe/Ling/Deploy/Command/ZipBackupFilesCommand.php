<?php


namespace Ling\Deploy\Command;


use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The ZipBackupFilesCommand class.
 *
 * Creates a zip archive containing files backups, based on provided filtering criteria.
 *
 * It is meant to be executed on the remote only.
 *
 * This command is used internally by the following commands:
 * - fetch-backup-files
 *
 *
 * Options
 * --------------
 *
 * - dir=$path: the backup directory path
 * - dst=$path: the path to the zip archive to create.
 *          Note: necessary folders will be created.
 * - ext=$extension: the extension to append to the backup name (if omitted)
 *
 * - ?names=$names: the comma separated list of backup names to put in the archive
 * - ?last=$number: indicates the (max) number of non-named backups to push.
 *
 *
 *
 */
class ZipBackupFilesCommand extends AbstractBackupCommand
{

    /**
     * This property holds the exitCode for this instance.
     * @var int = 0
     */
    protected $exitCode;


    /**
     * Builds the ZipBackupFilesCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->exitCode = 0;
    }

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $dir = $input->getOption('dir', null);
        $dst = $input->getOption('dst', null);
        $ext = $input->getOption('ext', null);


        $indentLevel = $this->application->getBaseIndentLevel();

        if (null !== $dir) {
            if (null !== $dst) {
                if (null !== $ext) {
                    if (is_dir($dir)) {


                        $res = $this->createArchive($input, $output);
                        if (false === $res) {
                            return 3;
                        }
                        return $this->exitCode;

                    } else {
                        H::info(H::i($indentLevel) . "The backup dir <b>$dir</b> doesn't exist. Nothing to do." . PHP_EOL, $output);
                    }

                } else {
                    H::error(H::i($indentLevel) . "Missing option: <b>ext</b>." . PHP_EOL, $output);
                }
            } else {
                H::error(H::i($indentLevel) . "Missing option: <b>dst</b>." . PHP_EOL, $output);
            }
        } else {
            H::error(H::i($indentLevel) . "Missing option: <b>dir</b>." . PHP_EOL, $output);
        }
        return 2;
    }

    /**
     * @implementation
     */
    function onArchiveReady(InputInterface $input, OutputInterface $output)
    {

    }
}