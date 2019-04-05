<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\ConvertTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Application\DeployApplication;
use Ling\Deploy\Helper\DiffHelper;
use Ling\Deploy\Helper\Quoter;
use Ling\Deploy\Helper\RemoteConfHelper;


/**
 * The PushCommand class.
 *
 * Pushes the current site to the remote.
 * By default, it mirrors the current site to the remote (i.e. files can be removed on the remote).
 * More control on this behaviour gan be gained using the **mode** option.
 *
 *
 *
 * Flags
 * ----------
 *
 * -z: zip. Use a zip archive for transferring files. This is much faster than the default one by one method.
 *          However, you don't have the progress/details over the transferred files.
 *
 *
 * Options
 * ------------
 *
 * - ?mode=add,remove,replace.
 *      A comma separated list (extra space allowed) of the operation names to execute.
 *      The default value is: add,replace,remove.
 *      The possible operations are:
 *          - add: will add the files that are present in the local application but not in the remote
 *          - replace: will replace the files in the remote that are present in both the local application and the remote (but were modified)
 *          - remove: will remove the files in the remote that are not present in the local application
 *
 *      By default, all three operations are executed.
 *      So for instance, if you just want to upload the files from the local application to the remote without removing any
 *      files on the remote, you can use "mode=add,replace" or "mode=add".
 *
 *
 *
 *
 * Side notes about performance:
 * -------------------------
 * Here is a little comparison of different upload methods for a 51.9 Mb application.
 *
 * - transfer with Filezilla: about 7 minutes
 * - transfer with push -z (scp): about 7 minutes
 * - transfer with push (all 1435 files one by one via scp): 40 minutes
 *
 *
 *
 *
 */
class PushCommand extends DeployGenericCommand
{

    /**
     * This property holds the sentence for this instance.
     * The main sentence to display to the console before starting the command.
     * @var string
     */
    protected $sentence;


    /**
     * This property holds the useDiffBack for this instance.
     * Whether to use diff or diffback command for the diff map.
     *
     * @var bool = false
     */
    protected $useDiffBack;

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->sentence = "Pushing application dir <b>{app}</b> to remote";
        $this->useDiffBack = false;
    }

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        $useZip = $input->hasFlag("z");
        $sMode = $input->getOption('mode', 'add,replace,remove');


        $conf = $this->application->getProjectConf();
        $projectIdentifier = $this->application->getProjectIdentifier();
        $appDir = $conf['root_dir'];
        $remoteSshConfigId = $conf['ssh_config_id'];
        $remoteRootDir = $conf['remote_root_dir'];


        $allowedModes = ['add', 'replace', 'remove'];
        $modes = array_map(function ($v) {
            return trim($v);
        }, explode(',', $sMode));
        $syntaxError = false;
        foreach ($modes as $mode) {
            if (false === in_array($mode, $allowedModes, true)) {
                $syntaxError = true;
                $invalidMode = $mode;
                break;
            }
        }


        //--------------------------------------------
        //
        //--------------------------------------------
        if (false === $syntaxError) {


            $sentence = str_replace([
                '{app}',
            ], [
                $appDir,
            ], $this->sentence);
            if (true === $useZip) {
                $sentence .= ", using zip method";
            }
            H::info(H::i($indentLevel) . $sentence . ":" . PHP_EOL, $output);

            //--------------------------------------------
            // CREATING THE DIFF
            //--------------------------------------------
            $cmdName = (false === $this->useDiffBack) ? 'diff' : 'diffback';
            $appInput = new ArrayInput();
            $appInput->setItems([
                ":$cmdName" => true,
                "p" => $projectIdentifier,
                "-f" => true,
                "indent" => $indentLevel + 1,
            ]);
            $app = new DeployApplication();
            $app->run($appInput, $output);
            $addFile = $appDir . "/.deploy/diff-add.txt";
            $removeFile = $appDir . "/.deploy/diff-remove.txt";
            $replaceFile = $appDir . "/.deploy/diff-replace.txt";
            $parseAdd = true;
            $parseRemove = true;
            $parseReplace = true;


            if (in_array('add', $modes, true)) {
                if (false === file_exists($addFile)) {
                    $parseAdd = false;
                    H::warning(H::i($indentLevel + 2) . "<b>diff-add</b> file not found in $addFile." . PHP_EOL, $output);
                }
            } else {
                $parseAdd = false;
            }

            if (in_array('replace', $modes, true)) {
                if (false === file_exists($replaceFile)) {
                    $parseReplace = false;
                    H::warning(H::i($indentLevel + 2) . "<b>diff-replace</b> file not found in $replaceFile." . PHP_EOL, $output);
                }
            } else {
                $parseReplace = false;
            }

            if (in_array('remove', $modes, true)) {
                if (false === file_exists($removeFile)) {
                    $parseRemove = false;
                    H::warning(H::i($indentLevel + 2) . "<b>diff-remove</b> file not found in $removeFile." . PHP_EOL, $output);
                }
            } else {
                $parseRemove = false;
            }


            $nbOperations = 0;
            if (true === $parseAdd) {
                $rPathsAdd = file($addFile, \FILE_IGNORE_NEW_LINES);
                $nbOperations += count($rPathsAdd);
            }
            if (true === $parseRemove) {
                $rPathsRemove = file($removeFile, \FILE_IGNORE_NEW_LINES);
                $nbOperations += count($rPathsRemove);
            }
            if (true === $parseReplace) {
                $rPathsReplace = file($replaceFile, \FILE_IGNORE_NEW_LINES);
                $nbOperations += count($rPathsReplace);
            }


            //--------------------------------------------
            // SHOWING DIFF MAP
            //--------------------------------------------
            if (true) {
                DiffHelper::showDiff($output, $rPathsAdd, $rPathsRemove, $rPathsReplace);
            }


            $this->onDiffReady([
                'useZip' => $useZip,
                'indentLevel' => $indentLevel,
                'nbOperations' => $nbOperations,
                'remoteRootDir' => $remoteRootDir,
                'remoteSshConfigId' => $remoteSshConfigId,
                'appDir' => $appDir,
                'parseAdd' => $parseAdd,
                'rPathsAdd' => $rPathsAdd,
                'parseReplace' => $parseReplace,
                'rPathsReplace' => $rPathsReplace,
                'parseRemove' => $parseRemove,
                'rPathsRemove' => $rPathsRemove,
                'removeFile' => $removeFile,
            ], $output);
            return 0;


        } else {
            H::error(H::i($indentLevel) . "Invalid mode: <b>$invalidMode</b>." . PHP_EOL, $output);
        }

        return 2;
    }


    /**
     * Executes the mirroring operation, based on the diff map.
     *
     * @param array $params
     * @param OutputInterface $output
     * @throws \Ling\Bat\Exception\BatException
     */
    protected function onDiffReady(array $params, OutputInterface $output)
    {

        $useZip = $params['useZip'];
        $indentLevel = $params['indentLevel'];
        $nbOperations = $params['nbOperations'];
        $remoteRootDir = $params['remoteRootDir'];
        $remoteSshConfigId = $params['remoteSshConfigId'];
        $appDir = $params['appDir'];
        $parseAdd = $params['parseAdd'];
        $rPathsAdd = $params['rPathsAdd'];
        $parseReplace = $params['parseReplace'];
        $rPathsReplace = $params['rPathsReplace'];
        $parseRemove = $params['parseRemove'];
        $rPathsRemove = $params['rPathsRemove'];
        $removeFile = $params['removeFile'];


        if (false === $useZip) {
            //--------------------------------------------
            // PUSH ONE BY ONE METHOD
            //--------------------------------------------
            H::info(H::i($indentLevel + 1) . "Applying the diff map:" . PHP_EOL, $output);


            $count = 1;
            $nbFailure = 0;
            if (true === $parseAdd) {
                foreach ($rPathsAdd as $rPath) {
                    H::info(H::i($indentLevel + 2) . "Adding <b>$rPath</b> to remote ($count/$nbOperations)...", $output);
                    $remoteDir = dirname("$remoteRootDir/$rPath");
                    $dstPath = Quoter::scpEscapeSpace("$remoteRootDir/$rPath");
                    $cmd = "ssh $remoteSshConfigId 'mkdir -p \"$remoteDir\"' && scp -Cq \"$appDir/$rPath\" $remoteSshConfigId:\"$dstPath\"";
                    if (true === ConsoleTool::exec($cmd)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);
                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        $nbFailure++;
                    }
                    $count++;
                }
            }
            if (true === $parseReplace) {
                foreach ($rPathsReplace as $rPath) {
                    H::info(H::i($indentLevel + 2) . "Replacing <b>$rPath</b> in remote ($count/$nbOperations)...", $output);
                    $remoteDir = dirname("$remoteRootDir/$rPath");
                    $dstPath = Quoter::scpEscapeSpace("$remoteRootDir/$rPath");
                    $cmd = "ssh $remoteSshConfigId 'mkdir -p \"$remoteDir\"' && scp -Cq \"$appDir/$rPath\" $remoteSshConfigId:\"$dstPath\"";
                    if (true === ConsoleTool::exec($cmd)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);
                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        $nbFailure++;
                    }
                    $count++;
                }
            }
            if (true === $parseRemove) {
                foreach ($rPathsRemove as $rPath) {
                    H::info(H::i($indentLevel + 2) . "Removing <b>$rPath</b> from remote ($count/$nbOperations)...", $output);
                    $cmd = "ssh $remoteSshConfigId 'rm \"$remoteRootDir/$rPath\"'";
                    if (true === ConsoleTool::exec($cmd)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);
                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        $nbFailure++;
                    }
                    $count++;
                }
            }


            if ($nbFailure > 0) {
                H::error(H::i($indentLevel + 1) . "Number of failed operations: $nbFailure." . PHP_EOL, $output);
            }


        } else {
            //--------------------------------------------
            // PUSH ALL AT ONCE WITH ZIP METHOD
            //--------------------------------------------
            /**
             * The basic strategy here is the following:
             *
             *
             * - create the zip by putting all "add" and "replace" files in it.
             * - upload the zip to the remote, extract it, and copy all files to the remote app. If a file exist, overwrite it.
             * - if "remove", upload the diff-remove.txt map on the remote and ask the remote to remove those files.
             *
             */


            $limit = ini_get('memory_limit');
            ini_set('memory_limit', "256M");

            $zipFile = $appDir . "/.deploy/app.zip";


            $rpathsToAdd = [];
            $rpathsToRemove = [];
            if (true === $parseAdd) {
                $rpathsToAdd = $rPathsAdd;
            }
            if (true === $parseReplace) {
                foreach ($rPathsReplace as $rpath) {
                    $rpathsToAdd[] = $rpath;
                }
            }
            if (true === $parseRemove) {
                $rpathsToRemove = $rPathsRemove;
            }


            if ($rpathsToAdd) {


                H::info(H::i($indentLevel + 1) . "Creating archive in <b>$zipFile</b>...", $output);
                if (true === ZipTool::zipByPaths($zipFile, $appDir, $rpathsToAdd)) {

                    $output->write('<success>ok</success>.' . PHP_EOL);
                    ini_set('memory_limit', $limit);


                    $fileSize = ConvertTool::convertBytes(filesize($zipFile), 'h');
                    H::info(H::i($indentLevel + 1) . "Transferring zip archive ($fileSize) to remote...", $output);

                    $cmd = "scp -Cq \"$zipFile\" $remoteSshConfigId:\"" . Quoter::scpEscapeSpace($remoteRootDir) . "/.deploy/app.zip\"";


                    if (true === ConsoleTool::passThru($cmd)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);


                        H::info(H::i($indentLevel + 1) . "Unzipping the <b>app.zip</b> archive on the remote:" . PHP_EOL, $output);
                        $cmd = "ssh $remoteSshConfigId deploy unzip src=\"$remoteRootDir/.deploy/app.zip\" dst=\"$remoteRootDir\" indent=" . ($indentLevel + 2);
                        ConsoleTool::passThru($cmd);


                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        H::error(H::i($indentLevel + 2) . "Couldn't transfer the zip archive to the remote. Aborting." . PHP_EOL, $output);
                    }


                } else {
                    $output->write('<error>oops</error>.' . PHP_EOL);
                    H::error(H::i($indentLevel + 2) . "Couldn't create the archive. Aborting." . PHP_EOL, $output);
                    ini_set('memory_limit', $limit);
                }
            }


            if ($rpathsToRemove) {
                H::info(H::i($indentLevel + 1) . "Transferring <b>diff-remove.txt</b> to remote...", $output);

                $cmd = "scp -Cq \"$removeFile\" $remoteSshConfigId:\"" . Quoter::scpEscapeSpace($remoteRootDir) . "/.deploy/diff-remove.txt\"";

                if (true === ConsoleTool::passThru($cmd)) {
                    $output->write('<success>ok</success>.' . PHP_EOL);


                    $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
                    if (true === RemoteConfHelper::pushConf([
                            'root_dir' => $remoteRootDir,
                        ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel + 1)) {

                        $removeFileRemote = $remoteRootDir . "/.deploy/diff-remove.txt";

                        H::info(H::i($indentLevel + 1) . "Calling <b>remove</b> command with <b>diff-remove.txt</b> on <b>remote</b>:" . PHP_EOL, $output);
                        $mapCmd = "ssh $remoteSshConfigId deploy -x remove src=\"$removeFileRemote\" conf=\"$dstTmpConf\" indent=" . ($indentLevel + 2);
                        ConsoleTool::passThru($mapCmd);
                    }


                } else {
                    $output->write('<error>oops</error>.' . PHP_EOL);
                    H::error(H::i($indentLevel + 2) . "Couldn't transfer the <b>diff-remove.txt</b> file to the remote. Aborting." . PHP_EOL, $output);
                }

            }


            if (empty($rpathsToAdd) && empty($rpathsToRemove)) {
                H::info(H::i($indentLevel + 1) . "Nothing to do according to the diff map." . PHP_EOL, $output);
            }

        }
    }
}