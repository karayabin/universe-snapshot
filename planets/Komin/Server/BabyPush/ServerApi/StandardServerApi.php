<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\BabyPush\ServerApi;

use Komin\Server\AjaxTim\AjaxTimSessionInterface;
use Komin\Server\BabyPush\Server\BabyPushServer;
use Komin\Server\BabyPush\Task\TaskInterface;


/**
 * StandardServerApi
 * @author Lingtalfi
 * 2014-10-24
 *
 */
class StandardServerApi implements ServerApiInterface
{


    /**
     * @var AjaxTimSessionInterface
     */
    protected $ajaxTimSession;
    protected $pipesDir;
    protected $options;

    public function __construct($pipesDir, array $options = [])
    {
        $this->pipesDir = $pipesDir;
        $this->options = array_replace([
            'getTask' => null,
            /**
             * If nl2br is true, nl2br will be applied to the pipe content before being returned.
             * That might be useful when you monitor some bash commands' outputs.
             */
            'nl2br' => false,
            'ajaxTimSession' => null,
        ], $options);

        if ($this->options['ajaxTimSession'] instanceof AjaxTimSessionInterface) {
            $this->ajaxTimSession = $this->options['ajaxTimSession'];
        }
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ServerApiInterface
    //------------------------------------------------------------------------------/
    public function listen()
    {


        if (isset($_POST['action'])) {

            $action = $_POST['action'];
            $taskParams = (array_key_exists('taskParams', $_POST)) ? $_POST['taskParams'] : [];
            $server = new BabyPushServer($this->pipesDir);


            switch ($action) {
                case 'getFileId':
                    $fileId = $server->createPipe($taskParams);
                    $this->setSuccessData($fileId);
                    break;
                case 'executeTask':
                    if (isset($_POST['fileId'])) {
                        $fileId = $_POST['fileId'];
                        $oTask = $this->getTask($taskParams, $fileId);
                        if ($oTask instanceof TaskInterface) {
                            $server->executeTask($oTask, $fileId);
                        }
                        else {
                            $this->setErrorMsg(sprintf("Cannot create the task with fileId: %s and the given taskParams", $fileId));
                        }
                    }
                    else {
                        $this->setErrorMsg("fileId parameter missing");
                    }
                    break;
                case 'watchProgress':
                    if (isset($_POST['fileId'])) {
                        $fileId = $_POST['fileId'];
                        list($data, $isEnd) = $server->watchProgression($fileId);
                        if (true === $this->options['nl2br']) {
                            $data = nl2br($data);
                        }
                        $this->setSuccessData([
                            'data' => $data,
                            'isEnd' => $isEnd,
                        ]);
                    }
                    else {
                        $this->setErrorMsg("fileId parameter missing");
                    }
                    break;
                default:
                    $this->setErrorMsg(sprintf("Unknown action: %s", $action));
                    break;
            }


        }
        else {
            $this->setErrorMsg("No params");
        }
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setOption($k, $v)
    {
        $this->options[$k] = $v;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return TaskInterface|false
     */
    protected function getTask(array $taskParams, $fileId)
    {
        $ret = false;
        if (is_callable($this->options['getTask'])) {
            $ret = call_user_func($this->options['getTask'], $taskParams, $fileId);
        }
        return $ret;
    }


    protected function setErrorMsg($msg)
    {
        if ($this->ajaxTimSession) {
            $this->ajaxTimSession->setErrorMsg($msg);
        }
        else {
            echo 'error:' . $msg;
        }
    }

    protected function setSuccessData($msg)
    {
        if ($this->ajaxTimSession) {
            $this->ajaxTimSession->setSuccessData($msg);
        }
        else {
            echo 'success:' . json_encode($msg);
        }
    }
}
