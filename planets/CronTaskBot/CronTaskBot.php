<?php


namespace CronTaskBot;


use CronTaskBot\CronTask\CronTaskInterface;

class CronTaskBot implements CronTaskBotInterface
{


    public static function create()
    {
        return new static();
    }


    /**
     * @param array $tasks , array of name => CronTaskInterface
     * @return mixed
     */
    public function executeTasks(array $tasks): array
    {
        $ret = [];
        foreach ($tasks as $taskName => $task) {
            if ($task instanceof CronTaskInterface) {
                $ret[] = $this->executeTask($taskName, $task);
            } else {
                $ret[] = $this->executeNotATask($taskName, $task);
            }
        }
        return $ret;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function executeTask($name, CronTaskInterface $task)
    {
        $ret = $this->getDefaultTaskReturn($name);
        try {

            $ret['task_label'] = $task->getLabel();
            $task->execute();

            $ret['is_successful'] = (int)$task->isSuccessful();
            $ret['info_messages'] = $task->getInfoMessages();
            $ret['error_messages'] = $task->getErrorMessages();


        } catch (\Exception $e) {
            $ret['is_successful'] = 0;
            $ret['exception'] = "$e";
        }


        $ret['execution_end_date'] = $this->now();
        return $ret;
    }

    protected function executeNotATask($name, $thing)
    {
        return $this->getDefaultTaskReturn($name);
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    private function now()
    {
        return date("Y-m-d H:i:s");
    }


    private function getDefaultTaskReturn($name)
    {
        $now = $this->now();
        return [
            'task_name' => $name,
            'task_label' => "",
            'execution_start_date' => $now,
            'execution_end_date' => $now,
            'is_successful' => 0,
            'info_messages' => [],
            'error_messages' => [],
            'exception' => "",
        ];
    }
}