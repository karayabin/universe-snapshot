<?php


namespace Tim\TimServer;

use Tim\TimServerGlobal;


/**
 * TimServer
 * @author Lingtalfi
 * 2014-10-24
 *
 */
class TimServer implements TimServerInterface
{

    private $type;
    private $message;
    private $onExceptionCaughtCb;
    protected $serviceName; // for service providers only

    public function __construct()
    {
        $this->message = 'server not configured yet';
        $this->type = 'e';
    }

    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS TimServerInterface
    //------------------------------------------------------------------------------/
    public function output()
    {
        echo json_encode([
            't' => $this->type,
            'm' => $this->message,
        ]);
    }


    public function error($msg)
    {
        $this->type = 'e';
        $this->message = $msg;
        return $this;
    }

    public function success($msg)
    {
        $this->type = 's';
        $this->message = $msg;
        return $this;
    }

    public function setOnExceptionCaughtCb(callable $onExceptionCaughtCb)
    {
        $this->onExceptionCaughtCb = $onExceptionCaughtCb;
        return $this;
    }

    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
        return $this;
    }





    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function start($callable)
    {
        if (is_callable($callable)) {
            try {
                call_user_func($callable, $this);
            } catch (\Exception $e) {
                $this->onExceptionCaught($e);
                $this->log($e);
                if (null !== $this->onExceptionCaughtCb) {
                    call_user_func($this->onExceptionCaughtCb, $e, $this);
                }
            }
        }
        else {
            throw new \InvalidArgumentException("callable must be a callable");
        }
        return $this;
    }


    protected function log(\Exception $e)
    {
        if (false !== ($cb = TimServerGlobal::getLogCb($this->serviceName))) {
            call_user_func($cb, $e, $this->serviceName);
        }
    }

    protected function onExceptionCaught(\Exception $e)
    {
        $this->error($e->getMessage());
    }
}
