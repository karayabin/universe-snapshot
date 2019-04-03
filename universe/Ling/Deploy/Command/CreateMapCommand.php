<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\MapHelper;
use Ling\Deploy\Helper\RemoteConfHelper;

/**
 * The CreateMapCommand class.
 *
 * This command creates a map of the current application.
 * The map will be located at **$root_dir/.deploy/map.txt**.
 *
 * If the **-r** flag is set, the operation will be executed on the remote.
 *
 *
 *
 * Options
 * ----------
 * - -r: remote. If set,  executes the operation on the remote.
 *      In this case, the map will be located at **$remote_root_dir/.deploy/map.txt**
 * - -d: display on screen. If set, the map will also be displayed on the screen.
 *
 * - conf=$confPath: a proxy conf to use instead of the project conf. This is used internally. You shouldn't need that option.
 *
 * - word=string. The word used in the sentence: "Creating $word to <b>$mapFile</b>.",
 *              which is the first sentence displayed by this command.
 *              This option allows other commands to customize this command message.
 *
 *
 */
class CreateMapCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {


        $onRemote = $input->hasFlag("r");
        $displayOnScreen = $input->hasFlag("d");
        $confPath = $input->getOption("conf");
        $word = $input->getOption("word", 'map');

        $indentLevel = $this->application->getBaseIndentLevel();


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }


        if (true === $onRemote) {

            $remoteSshConfigId = $conf['ssh_config_id'];
            $remoteRootDir = $conf['remote_root_dir'];
            $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
            $appDir = $conf['root_dir'];
            if (true === RemoteConfHelper::pushConf([
                    'root_dir' => $remoteRootDir,
                    'map-conf' => $conf['map-conf'],
                ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                H::info(H::i($indentLevel) . "Calling <b>$word</b> command on <b>remote</b>:" . PHP_EOL, $output);

                $sDisplay = (true === $displayOnScreen) ? '-d' : '';
                $mapCmd = "ssh $remoteSshConfigId deploy -x map $sDisplay conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($mapCmd)) {
                    return 0;
                }
            }


        } else {


            $applicationDir = $conf['root_dir'];
            $mapConf = $conf["map-conf"];
            $mapFile = $applicationDir . '/.deploy/map.txt';
            $word = 'map';


            //--------------------------------------------
            //
            //--------------------------------------------
            H::info(H::i($indentLevel) . "Creating $word to <b>$mapFile</b>...", $output);


            $lines = [];


            if (file_exists($applicationDir)) {


                $files = MapHelper::collectFiles($applicationDir, $mapConf);


                $heavyExtensions = ["mp4"];
                foreach ($files as $file) {
                    $baseName = basename($file);
                    $lastPos = strrpos($baseName, '.');
                    $absFile = $applicationDir . "/" . $file;
                    if (false !== $lastPos) {
                        $ext = strtolower(substr($baseName, $lastPos + 1));
                        if (false === in_array($ext, $heavyExtensions, true)) {
                            $lines[] = $file . '::' . hash_file("haval160,4", $absFile);
                        } else {
                            $size = filesize($absFile);
                            $lines[] = $file . ' : ' . $size;
                        }
                    } else {
                        $lines[] = $file . '::' . hash_file("haval160,4", $absFile);
                    }
                }
            }

            if (true === FileSystemTool::mkfile($mapFile, implode(PHP_EOL, $lines))) {
                $output->write("<success>ok</success>." . PHP_EOL);


                if (true === $displayOnScreen) {
                    $output->write(implode(PHP_EOL, $lines));
                    $output->write(PHP_EOL);
                }


                return 0;
            } else {
                $output->write("<error>oops</error>." . PHP_EOL);
                H::error(H::i($indentLevel) . "Could not create the map file." . PHP_EOL, $output);
            }
        }


        return 10;
    }


}