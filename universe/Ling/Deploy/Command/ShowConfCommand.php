<?php


namespace Ling\Deploy\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;

/**
 * The ShowConfCommand class.
 *
 * Shows the configuration of the current site.
 *
 *
 *
 */
class ShowConfCommand extends DeployGenericCommand
{


    public function run(InputInterface $input, OutputInterface $output)
    {

        $remote = $input->getOption("remote");
        $indentLevel = $this->application->getBaseIndentLevel();
        $conf = $this->application->getConf($output, $indentLevel);

        if (null === $remote) {
            $confString = BabyYamlUtil::getBabyYamlString($conf);
            $output->write($confString);
            $output->write(PHP_EOL);
        } else {


            $remoteConf = $this->application->getRemoteConf($remote, $output, $indentLevel);
            $remoteSshConfigId = $remoteConf['ssh_config_id'];
            $remoteRootDir = $remoteConf['root_dir'];


            /**
             * TODO: here use scp retrieve remote conf (use scpEscapeSpaee) to remote_conf.byml?
             * remove the remote_conf.byml when done
             */

            $cmd = "ssh $remoteSshConfigId 'deploy conf dir=\"$remoteRootDir\"'";
            if (false === ConsoleTool::exec($cmd)) {
                H::error(H::i($indentLevel) . "Could not call the remote's <b>conf</b> command." . PHP_EOL, $output);
            }
        }
    }
}