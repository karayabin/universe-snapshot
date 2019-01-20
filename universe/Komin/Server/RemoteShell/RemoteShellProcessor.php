<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\RemoteShell;

use BeeFramework\Component\Log\SuperLogger\SuperLogger;
use BeeFramework\Notation\File\BabyYaml\Tool\BabyYamlTool;
use BeeFramework\Bat\BdotTool;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Finder;
use Komin\Server\RemoteShell\Command\CommandInterface;


/**
 * RemoteShellProcessor
 * @author Lingtalfi
 * 2014-10-28
 *
 * Structure of a file.yml:
 *
 *
 * - ?vars
 * - apps:
 * ----- $appId
 * --------- $cmdId
 * ------------- command specific parameters...
 *
 *
 *
 *
 *
 *
 */
class RemoteShellProcessor implements RemoteShellProcessorInterface
{

    protected $dir;
    protected $commands;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'dir' => null,
            'commands' => [],
        ], $options);
        $this->commands = [];


        $this->setDir($options['dir']);
        foreach ($options['commands'] as $command) {
            $this->setCommand($command);
        }
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS RemoteShellProcessorInterface
    //------------------------------------------------------------------------------/
    public function applyCommands($machine, $app, $commandSet)
    {
        $machineDir = $this->dir . '/' . $machine;
        if (file_exists($machineDir)) {


            $confs = [];
            Finder::create($machineDir)
                ->files()
                ->extensions('yml')
                ->find(function (FinderFileInfo $file) use (&$confs) {
                    $confs[] = BabyYamlTool::parseFile($file);
                });

            $conf = call_user_func_array('array_replace_recursive', $confs);

            $path = 'apps.' . $app . '.' . $commandSet;
            if (null !== $commandSetConf = BdotTool::getDotValue($path, $conf)) {

                $appVars = (array_key_exists('_vars', $conf['apps'][$app]) && is_array($conf['apps'][$app]['_vars'])) ? $conf['apps'][$app]['_vars'] : [];

                foreach ($commandSetConf as $cmdName => $cmdParams) {
                    if (array_key_exists($cmdName, $this->commands)) {
                        $cmd = $this->commands[$cmdName];
                        /**
                         * @var CommandInterface $cmd
                         */
                        $cmdParams['_vars'] = $appVars;
                        $cmd->execute($cmdParams);
                    }
                    else {
                        $this->notFound("command", sprintf("Command not found: %s, in command set: %s with app: %s, on machine: %s", $cmdName, $commandSet, $app, $machine));
                    }
                }
            }
            else {
                $this->notFound('commandSet', sprintf("Command set not found: %s with app: %s on machine: %s", $commandSet, $app, $machine));
            }
        }
        else {
            $this->notFound('machineDir', sprintf("MachineDir not found: %s", $machineDir));
        }
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    public function setCommand(CommandInterface $command)
    {
        $this->commands[$command->getName()] = $command;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function log($id, $msg)
    {
        SuperLogger::getInst()->log('remoteBash.' . $id, $msg);
    }

    protected function notFound($id, $msg)
    {
        $this->log("notFound." . $id, $msg);
    }
}
