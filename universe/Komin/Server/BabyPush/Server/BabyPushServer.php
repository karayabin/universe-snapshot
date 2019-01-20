<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\BabyPush\Server;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Bat\FileTool;
use BeeFramework\Bat\RandomTool;
use Komin\Server\BabyPush\Task\TaskInterface;


/**
 * BabyPushServer
 * @author Lingtalfi
 * 2014-10-24
 *
 */
class BabyPushServer implements BabyPushServerInterface
{

    protected $fileId2Tasks;
    protected $pipesDir;
    protected $options;

    public function __construct($pipesDir, array $options = [])
    {
        $this->options = array_replace([
            'onTaskInterrupted' => function (\Exception $e, TaskInterface $task) {
                    $task->feedPipe(sprintf("\nBabyPushServer: the task failed with message: %s", $e->getMessage()));
                },
        ], $options);
        $this->fileId2Tasks = [];
        $this->pipesDir = $pipesDir;
        if (!is_dir($pipesDir)) {
            if (false === @mkdir($pipesDir, 0777, true)) {
                $this->error(sprintf("Cannot create pipesDir: %s", $pipesDir));
            }
        }
        if (!is_writable($pipesDir)) {
            $this->error(sprintf("The pipesDir must be writable: %s", $pipesDir));
        }

    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS BabyPushServerInterface
    //------------------------------------------------------------------------------/
    /**
     * @return fileId
     */
    public function createPipe(array $taskParams = [])
    {
        // choose the file id
        $baseName = RandomTool::getRandom(8) . '.txt';
        $filePath = FileSystemTool::getUniqueResource($this->pipesDir, $baseName);
        $fileId = basename($filePath);

        // create the pipe
        $path = $this->getPipeByFileId($fileId);
        if (false === @touch($path)) {
            $this->error(sprintf("An error occurred while trying to create the pipe at %s", $path));
        }
        return $fileId;
    }


    public function executeTask(TaskInterface $task, $fileId)
    {
        $pipe = $this->getPipeByFileId($fileId);
        $task->setPipe($pipe);
        // note: this might block the current php process, depending on the Task


        /**
         * In this implementation, we capture a task exception,
         * so that the main script can possibly display them in an output log,
         * or to allow logging of a failing task.
         * By default, we will display the exception message after the output, then set the END flag.
         *
         * In other words, Tasks handled by this server can use exception to indicate an error.
         */
        try {
            $task->execute();
        } catch (\Exception $e) {
            if (is_callable($this->options['onTaskInterrupted'])) {
                call_user_func($this->options['onTaskInterrupted'], $e, $task);
            }
            $task->endTask();
        }
    }

    /**
     * @return [data, isEnd]:
     *  - data: string
     *  - isEnd: bool
     */
    public function watchProgression($fileId)
    {
        $data = '';
        $isEnd = false;
        $pipe = $this->getPipeByFileId($fileId);
        if (file_exists($pipe)) {
            if (false !== $data = file_get_contents($pipe)) {
                $isEnd = BabyPushServerTool::isEnded($data);
            } else {
                $this->error(sprintf("Cannot access the content of the pipe: %s", $pipe));
            }
            if (true === $isEnd) {
                BabyPushServerTool::removeEndFlag($data);
                if (false === @unlink($pipe)) {
                    $this->error(sprintf("Could not remove the pipe at: %s", $pipe));
                }
            }
        } else {
            $this->error(sprintf("Pipe does not exist: %s", $pipe));
        }
        return [$data, $isEnd];
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function getPipeByFileId($fileId)
    {
        // here is the layer to secure the fileId if needed...
        return $this->pipesDir . '/' . $fileId;
    }

    protected function error($msg)
    {
        // here you can add a log system...?
        throw new \RuntimeException($msg);
    }

}
