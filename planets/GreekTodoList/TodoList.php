<?php


namespace GreekTodoList;


class TodoList
{
    private $taskLists;
    private $startDate;

    public function __construct()
    {
        $this->taskLists = [];
    }

    public static function create()
    {
        return new static();
    }

    public function addTaskList(TaskList $list)
    {
        $this->taskLists[] = $list;
        return $this;
    }

    public function getNbTotalDays($ignoreDoneDays = false)
    {
        $n = 0;
        foreach ($this->taskLists as $list) {
            /**
             * @var $list TaskList
             *
             */
            $n += $list->getNbTotalDays($ignoreDoneDays);
        }
        return $n;
    }

    /**
     * @return TaskList[]
     */
    public function getTaskLists()
    {
        return $this->taskLists;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEstimatedEndDate($ignoreDoneDays = false)
    {
        if (null === $this->startDate) {
            return null;
        }
        $time = strtotime($this->startDate);
        $time += 86400 * $this->getNbTotalDays($ignoreDoneDays);
        return date("Y-m-d", $time);
    }
}
