<?php


namespace CronTaskBot;


interface CronTaskBotInterface
{
    /**
     * @param array $tasks , array of name => CronTaskInterface
     * @return array of task item, each of which having the following structure:
     *
     *
     * - task_name: the name of the task
     * - task_label: the label of the task
     * - execution_start_date: the datetime when the task was started
     * - execution_end_date: the datetime when the task was finished (or null if the task couldn't be completed)
     * - is_successful: 0|1
     * - info_messages: array of info level (human) messages
     * - error_messages: array of error level (human) messages
     * - exception: the string version of the exception if any
     *
     */
    public function executeTasks(array $tasks): array;
}