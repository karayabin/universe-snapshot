<?php

namespace GreekTodoList;

class Task
{
    private $_label;
    private $_nbDays;
    private $_dev;
    private $_isCurrent;
    private $_subtasks;
    private $_comment;
    private $_dateAdded;
    private $_dateStarted;
    private $_doneDate;

    public function __construct()
    {
        $this->_dev = 'ling';
        $this->_isCurrent = false;
        $this->_doneDate = null;
        $this->_subtasks = [];
        $this->_dateAdded = null;
        $this->_dateStarted = null;
    }

    public static function create()
    {
        return new static();
    }

    public function setLabel($label)
    {
        $this->_label = $label;
        return $this;
    }

    public function setNbDays($nbDays)
    {
        $this->_nbDays = $nbDays;
        return $this;
    }

    public function setDev($dev)
    {
        $this->_dev = $dev;
        return $this;
    }

    public function setIsCurrent($isCurrent = true)
    {
        $this->_isCurrent = $isCurrent;
        return $this;
    }

    public function addSubTask(Task $task)
    {
        $this->_subtasks[] = $task;
        return $this;
    }

    public function setComment($comment)
    {
        $this->_comment = $comment;
        return $this;
    }

    public function setDateAdded($dateAdded)
    {
        $this->_dateAdded = $dateAdded;
        return $this;
    }

    public function setDateStarted($dateStarted)
    {
        $this->_dateStarted = $dateStarted;
        return $this;
    }

    public function setIsDone($doneDate = null)
    {
        if (null === $doneDate) {
            $doneDate = '0000-00-00';
        }
        $this->_doneDate = $doneDate;
        return $this;
    }

    public function getDateDone()
    {
        return $this->_doneDate;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    public function getTotalNbDays($ignoreDoneDays = false)
    {
        if (empty($this->_subtasks)) {
            if (true === $ignoreDoneDays && true === $this->isDone()) {
                return 0;
            }
            return $this->_nbDays;
        } else {
            $n = 0;
            foreach ($this->_subtasks as $task) {
                /**
                 * @var $task Task
                 */
                $n += $task->getTotalNbDays($ignoreDoneDays);
            }
            return $n;
        }
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * @return mixed
     */
    public function getNbDays()
    {
        return $this->_nbDays;
    }

    /**
     * @return string
     */
    public function getDev()
    {
        return $this->_dev;
    }

    /**
     * @return bool
     */
    public function isCurrent()
    {
        return $this->_isCurrent;
    }

    /**
     * @return Task[]
     */
    public function getSubTasks()
    {
        return $this->_subtasks;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * @return string
     */
    public function getDateAdded()
    {
        return $this->_dateAdded;
    }

    /**
     * @return string
     */
    public function getDateStarted()
    {
        return $this->_dateStarted;
    }

    public function isParent()
    {
        return (count($this->_subtasks) > 0);
    }


    public function isDone()
    {
        if ($this->isParent()) {
            foreach ($this->getSubTasks() as $task) {
                if (false === $task->isDone()) {
                    return false;
                }
            }
            return true;
        } else {
            return (null !== $this->_doneDate);
        }
    }
}