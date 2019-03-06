<?php


namespace Ling\StepFormBuilder\Pool;



use Ling\Bat\SessionTool;

class SessionPool implements PoolInterface
{

    private $sessionName;

    public function __construct()
    {
        $this->sessionName = "step-form-builder";
    }


    public function getPool()
    {
        SessionTool::start();
        if (array_key_exists($this->sessionName, $_SESSION)) {
            return $_SESSION[$this->sessionName];
        }
        return [
            'steps' => [],
            'done' => [],
            'active' => null,
        ];
    }

    public function setPool(array $data)
    {
        $_SESSION[$this->sessionName] = $data;
        return $this;
    }


    public function getPoolValue($key, $default = null)
    {
        SessionTool::start();
        if (
            array_key_exists($this->sessionName, $_SESSION) &&
            array_key_exists($key, $_SESSION[$this->sessionName])
        ) {
            return $_SESSION[$this->sessionName][$key];
        }
        return $default;
    }

    public function setPoolValue($key, $value)
    {
        SessionTool::start();
        $pool = $this->getPool();
        $pool[$key] = $value;
        $_SESSION[$this->sessionName] = $pool;
    }

    public function setPoolStepData($id, array $data)
    {
        SessionTool::start();
        $pool = $this->getPool();
        $pool['steps'][$id] = $data;
        $_SESSION[$this->sessionName] = $pool;
    }

    public function getPoolStepData($id)
    {
        SessionTool::start();
        $pool = $this->getPool();
        if (array_key_exists('steps', $pool)) {
            if (array_key_exists($id, $pool['steps'])) {
                return $pool['steps'][$id];
            }
        }
        return [];
    }

    public function setPoolStepDone($id, $isDone)
    {
        SessionTool::start();
        $pool = $this->getPool();
        $pool['done'][$id] = $isDone;
        $_SESSION[$this->sessionName] = $pool;
    }

    public function getPoolStepDone($id)
    {
        SessionTool::start();
        $pool = $this->getPool();
        if (array_key_exists('done', $pool)) {
            if (array_key_exists($id, $pool['done'])) {
                return $pool['done'][$id];
            }
        }
        return false;
    }


}