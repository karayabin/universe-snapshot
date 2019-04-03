<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The UnzipCommand class.
 *
 * This command is an utility to unzip zip archives into a given directory.
 *
 * Note: this doesn't remove existing files.
 * However, if a file already exists, it will be overwritten.
 *
 *
 * Options
 * ------------
 * - src=$path. The path to the zip archive to extract.
 * - dst=$path. The path to the target directory to extract the archive files into.
 * - -r: the remote flag. If set, this command will be called on the remote (over ssh) instead of the current site.
 *
 *
 */
class UnzipCommand extends DeployGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $src = $input->getOption('src', null);
        $dst = $input->getOption('dst', null);
        $useRemote = $input->hasFlag('r');
        $indentLevel = $this->application->getBaseIndentLevel();


        if (null !== $src) {
            if (null !== $dst) {


                if (true === $useRemote) {


                    $conf = $this->application->getProjectConf();
                    $remoteSshConfigId = $conf['ssh_config_id'];


                    H::info(H::i($indentLevel) . "Calling <b>unzip</b> command on remote:" . PHP_EOL, $output);
                    $cmd = "ssh $remoteSshConfigId deploy unzip src=\"$src\" dst=\"$dst\" indent=" . ($indentLevel + 1);
                    if (true === ConsoleTool::passThru($cmd)) {
                        return 0;
                    }


                } else {

                    H::info(H::i($indentLevel) . "Unzipping <b>$src</b> to <b>$dst</b>...", $output);
                    if (file_exists($src)) {

                        $targetDir = dirname($dst);
                        if (false === is_dir($targetDir)) {
                            FileSystemTool::mkdir($targetDir);
                        }
                        if (true === ZipTool::unzip($src, $dst)) {
                            $output->write('<success>ok</success>.' . PHP_EOL);


                            // cleaning __MACOSX directory if any
                            $macOsDir = $dst . "/__MACOSX";
                            if (is_dir($macOsDir)) {
                                FileSystemTool::remove($macOsDir);
                            }
                            return 0;

                        } else {
                            $output->write('<error>oops</error>.' . PHP_EOL);
                            H::error(H::i($indentLevel + 1) . "Couldn't extract the zip archive." . PHP_EOL, $output);
                        }
                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        H::error(H::i($indentLevel + 1) . "The src file doesn't exist: <b>$src</b>. Aborting." . PHP_EOL, $output);
                    }
                }
            } else {
                H::error(H::i($indentLevel) . "Missing option: <b>dst</b>." . PHP_EOL, $output);
            }
        } else {
            H::error(H::i($indentLevel) . "Missing option: <b>src</b>." . PHP_EOL, $output);
        }
        return 2;
    }
}