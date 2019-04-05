<?php


namespace Ling\Deploy\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\ScpHelper;

/**
 *
 * The CronDeployCommand class.
 * This command will basically allow the remote to use the deploy command, so that
 * the deploy backup related commands can be used on the remote in a cron task.
 *
 * Note: all commands doesn't make sense when called from the remote.
 * For instance, fetch will fail. In fact, all commands involving the "remote_root_dir" directive won't make sense on the remote,
 * and so basically only the backup related commands should be used.
 * I didn't put a hardcoded limitation, I trust the common sense of the user to guess which command should work/not work.
 *
 *
 *
 * This command will effectively upload the following files/dirs on the remote:
 *
 * - $remote_app/.deploy/cron-deploy/cron-deploy.php
 * - $remote_app/.deploy/cron-deploy/cron-deploy-universe
 * - $remote_app/.deploy/cron-deploy/cron-deploy-conf.byml
 *
 *
 * The **cron-deploy.php** file is the deploy script which should be called in the cron tasks.
 * For instance in a cron task to save the database every day at 3AM, you could use this:
 *
 * ```bash
 * 0 3 * * * php -f $remote_app/.deploy/cron-deploy/cron-deploy.php -- backup-db >/dev/null 2>&1
 * ```
 *
 * Note: the project identifier is hardcoded in the cron-deploy.php script.
 *
 *
 *
 * The **cron-deploy-universe** dir is the mini @page(universe) used by the **cron-deploy.php** script.
 * The **cron-deploy-conf.byml** is the part of the configuration file used for the project.
 * Note: it will store database passwords (if you have some).
 *
 *
 *
 * This commands depends on the @page(uni tool) (to create the cron-deploy-universe from a map).
 *
 *
 */
class CronDeployCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        $conf = $this->application->getProjectConf();
        $projectIdentifier = $this->application->getProjectIdentifier();
        $remoteConf = $conf;
        $sshConfigId = $conf['ssh_config_id'];
        $appDir = $conf['root_dir'];
        $cronAssetsDir = __DIR__ . "/../assets/cron-deploy";
        $deployRemote = $conf['remote_root_dir'] . "/.deploy";

        $remoteConf['root_dir'] = $remoteConf['remote_root_dir'];
        unset($remoteConf['remote_root_dir']);
        unset($remoteConf['ssh_config_id']);


        //--------------------------------------------
        // Uploading cron-deploy dir
        //--------------------------------------------
        H::info(H::i($indentLevel) . "Uploading <b>cron-deploy</b> directory to <b>$deployRemote</b>...", $output);
        if (true === ScpHelper::push($cronAssetsDir, $deployRemote, $sshConfigId)) {
            $output->write('<success>ok</success>.' . PHP_EOL);

            //--------------------------------------------
            // Uploading custom cron-deploy.php script
            //--------------------------------------------
            $cronScriptLocalSrc = $cronAssetsDir . "/cron-deploy.php";
            $cronScriptLocal = $appDir . "/.deploy/cron-deploy/cron-deploy.php";
            $cronScriptRemote = $deployRemote . "/cron-deploy/cron-deploy.php";
            $content = file_get_contents($cronScriptLocalSrc);
            $content = str_replace('my_project_identifier', $projectIdentifier, $content);
            FileSystemTool::mkfile($cronScriptLocal, $content);


            H::info(H::i($indentLevel) . "Uploading <b>cron-deploy.php</b> script to <b>$cronScriptRemote</b>...", $output);
            if (true === ScpHelper::push($cronScriptLocal, $cronScriptRemote, $sshConfigId)) {
                $output->write('<success>ok</success>.' . PHP_EOL);


                //--------------------------------------------
                // Uploading cron-deploy-config.byml
                //--------------------------------------------
                // first create conf file locally
                $cronConfLocal = $appDir . "/.deploy/cron-deploy/cron-deploy-conf.byml";

                $cronConf = [
                    "projects" => [
                        $projectIdentifier => $remoteConf,
                    ],
                ];

                if (true === BabyYamlUtil::writeFile($cronConf, $cronConfLocal)) {
                    $cronConfRemote = $deployRemote . "/cron-deploy/cron-deploy-conf.byml";
                    H::info(H::i($indentLevel) . "Uploading <b>partial conf</b> to <b>$cronConfRemote</b>...", $output);
                    if (true === ScpHelper::push($cronConfLocal, $cronConfRemote, $sshConfigId)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);


                        $remoteUniverseApp = $deployRemote . "/cron-deploy";
                        $remoteMap = $deployRemote . "/cron-deploy/cron-deploy-universe/map.byml";
                        H::info(H::i($indentLevel) . "Importing universe from map <b>$remoteMap</b>:" . PHP_EOL, $output);

                        $cmd = "ssh $sshConfigId uni reimport-map \"$remoteMap\" universe-dir-name=cron-deploy-universe application-dir=\"$remoteUniverseApp\"";
                        $ret = ConsoleTool::passThru($cmd);
                        /**
                         * Note: at the moment the uni reimport-map doesn't handle exit code (I believe, not 100% sure...),
                         * so this is a fake condition which always evaluates to true...
                         * Should have a look into it some day...
                         */
                        if (true === $ret) {
                            $file = $deployRemote . "/cron-deploy/cron-deploy.php";
                            H::success(H::i($indentLevel) . "The cron-deploy script was successfully deployed to <b>$file</b>." . PHP_EOL, $output);
                            return 0;
                        } else {
                            H::error(H::i($indentLevel) . "Could not import universe." . PHP_EOL, $output);
                        }
                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        H::error(H::i($indentLevel) . "Could not upload the <b>partial conf</b>." . PHP_EOL, $output);
                    }
                } else {
                    H::error(H::i($indentLevel) . "Could not create the cron temporary local file in <b>$cronConfLocal</b>." . PHP_EOL, $output);
                }


            } else {
                $output->write('<error>oops</error>.' . PHP_EOL);
                H::error(H::i($indentLevel) . "Could not upload the <b>cron-deploy.php</b> script." . PHP_EOL, $output);
            }
        } else {
            $output->write('<error>oops</error>.' . PHP_EOL);
            H::error(H::i($indentLevel) . "Could not upload the <b>cron-deploy</b> directory." . PHP_EOL, $output);
        }
        return 5;
    }
}