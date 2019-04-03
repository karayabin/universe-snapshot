<?php


namespace Ling\Deploy\Command;


use Ling\Bat\FileSystemTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;


/**
 * The ZipBackupCommand class.
 *
 * Creates a zip archive containing the selected backup files.
 * It is meant to be executed on the remote only.
 *
 * This command is used internally by the following commands:
 * - fetch-backup-db
 *
 *
 * Options
 * --------------
 *
 * - dir=$path: the backup directory path
 * - dst=$path: the path to the zip archive to create.
 *          Note: necessary folders will be created.
 * - ext=$extension: the extension to append to the backup name (if omitted)
 * - ?names=$names: the comma separated list of backup names to put in the archive
 *
 *
 *
 *
 */
class ZipBackupCommand extends DeployGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $dir = $input->getOption('dir', null);
        $dst = $input->getOption('dst', null);
        $name = $input->getOption('names', null);
        $ext = $input->getOption('ext', null);

        $indentLevel = $this->application->getBaseIndentLevel();

        if (null !== $dir) {
            if (null !== $dst) {
                if (null !== $ext) {
                    if (is_dir($dir)) {


                        $files = YorgDirScannerTool::getFilesWithExtension($dir, $ext, false, true);
                        if (null !== $name) {
                            $names = explode(',', $name);
                            $names = array_map(function ($v) use ($ext) {
                                $v = trim($v);
                                if ('.' . $ext !== substr($v, (1 + strlen($ext)) * -1)) {
                                    $v .= "." . $ext;
                                }
                                return $v;
                            }, $names);

                            $files = array_filter($files, function ($v) use ($names) {
                                return in_array(basename($v), $names, true);
                            });
                        }


                        H::info(H::i($indentLevel) . "Listing files to put in the zip archive:" . PHP_EOL, $output);
                        if ($files) {
                            foreach ($files as $file) {
                                H::info(H::i($indentLevel + 1) . "- $file" . PHP_EOL, $output);
                            };


                            H::info(H::i($indentLevel) . "Creating zip archive in <b>$dst</b>...", $output);

                            $len = mb_strlen(rtrim(realpath($dir), '/'));
                            $relativePaths = array_map(function ($v) use ($len) {
                                return mb_substr($v, $len + 1);
                            }, $files);


                            $errors = [];
                            $failed = [];
                            FileSystemTool::remove($dst);
                            if (true === ZipTool::zipByPaths($dst, $dir, $relativePaths, $errors, $failed)) {
                                $output->write('<success>ok</success>' . PHP_EOL);
                                return 0;
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
                        } else {
                            H::info(H::i($indentLevel + 1) . "No files found." . PHP_EOL, $output);
                        }
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
}