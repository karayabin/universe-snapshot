<?php


namespace Ling\Deploy\Command;


use Ling\Bat\BDotTool;
use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Application\DeployApplication;
use Ling\Deploy\Util\DiffUtil;

/**
 * The DiffCommand class.
 *
 * This command displays the diff between the current site map and the given remote's map.
 * The maps are recreated on the fly every time.
 *
 * Symlinks are not followed.
 *
 * Each map is created using its own configuration: the map on the site is created using the **map-conf** section of the site's conf,
 * whereas the remote map is created using the **map-conf** section of the remote's conf.
 *
 * As a way to have more control from the site (rather than the remote), the diff command also reuses the
 * **ignore** key of the **map-conf** section of the site's conf.
 *
 *
 *
 *
 *
 * Flags
 * ------------
 * - -f: files. If this flag is set, the diff command will write the diff to 3 files instead of displaying it
 *          to the screen. The 3 files are:
 *              - $app/.deploy/diff-add.txt
 *              - $app/.deploy/diff-remove.txt
 *              - $app/.deploy/diff-replace.txt
 *
 *
 *
 */
class DiffCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {


        $indentLevel = $this->application->getBaseIndentLevel();


        $conf = $this->application->getConf($output, $indentLevel);
        $appDir = $this->application->getProjectDirectory();
        $mapConf = BDotTool::getDotValue("map-conf", $conf);
        $ignoreName = $mapConf['ignoreName'];
        $ignorePath = $mapConf['ignorePath'];

        $remote = $input->getOption('remote', null);
        $createFiles = $input->hasFlag('f');

        if (null !== $remote) {


            $remoteConf = $this->application->getRemoteConf($remote, $output, $indentLevel);
            $remoteSshConfigId = $remoteConf['ssh_config_id'];
            $remoteRootDir = $remoteConf['root_dir'];


            H::info(H::i($indentLevel) . "Creating diff between current site and remote <b>$remote</b>:" . PHP_EOL, $output);


            //--------------------------------------------
            // CREATING LOCAL MAP
            //--------------------------------------------
            $appInput = new ArrayInput();
            $appInput->setItems([
                ":map" => true,
                "dir" => $appDir,
                "word" => "local map",
                "indent" => $indentLevel + 1,
            ]);
            $app = new DeployApplication();
            $app->run($appInput, $output);


            //--------------------------------------------
            // CREATING REMOTE MAP
            //--------------------------------------------
            H::info(H::i($indentLevel + 1) . "Creating remote map...", $output);
            $mapCmd = "ssh $remoteSshConfigId deploy map dir=\"$remoteRootDir\" > /dev/null";
            $mapCmd = "ssh $remoteSshConfigId deploy map dir=\"$remoteRootDir\"";
            if (true === ConsoleTool::exec($mapCmd)) {
                $output->write("<success>ok</success>." . PHP_EOL);


                H::info(H::i($indentLevel + 1) . "Downloading remote map...", $output);
                $tmpFile = FileSystemTool::mkTmpFile("");
                $mapBackCmd = "scp -q $remoteSshConfigId:$remoteRootDir/.deploy/map.txt \"$tmpFile\"";
                if (true === ConsoleTool::exec($mapBackCmd)) {
                    $output->write("<success>ok</success>." . PHP_EOL);


                    //--------------------------------------------
                    // CREATING THE DIFF
                    //--------------------------------------------
                    H::info(H::i($indentLevel + 1) . "Creating diff map (from $tmpFile)...", $output);
                    $src = $appDir . "/.deploy/map.txt";
                    $util = new DiffUtil();
                    $diffMap = $util->getDiffMap($src, $tmpFile, [
                        "ignoreName" => $ignoreName,
                        "ignorePath" => $ignorePath,
                    ]);
                    $output->write("<success>ok</success>." . PHP_EOL);


                    $add = $diffMap['add'];
                    $remove = $diffMap['remove'];
                    $replace = $diffMap['replace'];

                    if (false === $createFiles) {

                        //--------------------------------------------
                        // DISPLAYING THE DIFF TO THE SCREEN...
                        //--------------------------------------------


                        $output->write("Add" . PHP_EOL);
                        $output->write(str_repeat('-', 14) . PHP_EOL);
                        foreach ($add as $item) {
                            $output->write('- ' . $item . PHP_EOL);
                        }


                        $output->write(PHP_EOL);
                        $output->write("Remove" . PHP_EOL);
                        $output->write(str_repeat('-', 14) . PHP_EOL);
                        foreach ($remove as $item) {
                            $output->write('- ' . $item . PHP_EOL);
                        }


                        $output->write(PHP_EOL);
                        $output->write("Replace" . PHP_EOL);
                        $output->write(str_repeat('-', 14) . PHP_EOL);
                        foreach ($replace as $item) {
                            $output->write('- ' . $item . PHP_EOL);
                        }
                    } else {
                        //--------------------------------------------
                        // ...OR CREATING THE FILES
                        //--------------------------------------------
                        $addFile = $appDir . '/.deploy/diff-add.txt';
                        $removeFile = $appDir . '/.deploy/diff-remove.txt';
                        $replaceFile = $appDir . '/.deploy/diff-replace.txt';
                        FileSystemTool::mkfile($addFile, implode(PHP_EOL, $add));
                        FileSystemTool::mkfile($removeFile, implode(PHP_EOL, $remove));
                        FileSystemTool::mkfile($replaceFile, implode(PHP_EOL, $replace));
                    }


                } else {
                    $output->write("<error>oops</error>." . PHP_EOL);
                    H::error(H::i($indentLevel + 2) . "Couldn't download the remote map. The command <b>$mapBackCmd</b> failed." . PHP_EOL, $output);
                }


            } else {
                $output->write("<error>oops</error>." . PHP_EOL);
                H::error(H::i($indentLevel + 2) . "Couldn't create the remote map. The command <b>$mapCmd</b> failed." . PHP_EOL, $output);
            }


        } else {
            H::error(H::i($indentLevel) . "Missing option: <b>remote</b>." . PHP_EOL, $output);
        }
    }

}