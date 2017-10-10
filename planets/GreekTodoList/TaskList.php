<?php


namespace GreekTodoList;

class TaskList
{
    private $label;
    private $tasks;

    public function __construct()
    {
        $this->tasks = [];
    }

    public static function create()
    {
        return new static();
    }

    public function addTask(Task $task)
    {
        $this->tasks[] = $task;
        return $this;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getNbTotalDays($ignoreDoneDays = false)
    {
        $n = 0;
        foreach ($this->tasks as $task) {
            /**
             * @var $task Task
             */
            $n += $task->getTotalNbDays($ignoreDoneDays);
        }
        return $n;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return Task[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}