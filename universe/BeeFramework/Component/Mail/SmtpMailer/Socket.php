<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Mail\SmtpMailer;

use BeeFramework\Bat\VarTool;
use BeeFramework\Chemical\Errors\Voles\VersatileErrorsTrait;
use BeeFramework\Component\Mail\SmtpMailer\Exception\SmtpMailerException;


/**
 * Socket
 * @author Lingtalfi
 * 2015-05-24
 *
 */
abstract class Socket
{

    use VersatileErrorsTrait;


    private $socket;
    private $onCommandSentListeners;
    protected $commandSuffix;


    public function __construct()
    {
        $this->socket = null;
        $this->onCommandSentListeners = [];
        $this->commandSuffix = "\r\n";
    }

    abstract protected function isValidResponse($response);


    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    public function openConnection($host, $port)
    {
        $errNo = 0;
        $errStr = '';
        if (false !== $socket = fsockopen($host, $port, $errNo, $errStr)) {
            stream_set_blocking($socket, true);
            $this->socket = $socket;
        }
        else {
            return $this->error("Could not open a connexion to host $host with port $port}. errNo: $errNo, errMsg:$errStr");
        }
        return true;
    }

    public function sendCommand($cmd = null)
    {
        if (null !== $cmd) {
            fputs($this->socket, $cmd . $this->commandSuffix);
        }
        $response = '';
        while (
            !feof($this->socket) &&
            ($info = stream_get_meta_data($this->socket)) &&
            !$info['timed_out']
            && $str = fgets($this->socket, 4096)
        ) {
            $response .= $str;
            if (true === $this->isValidResponse($response)) {
                break;
            }
        }

        if ($this->onCommandSentListeners) {
            foreach ($this->onCommandSentListeners as $listener) {
                call_user_func($listener, $cmd, $response);
            }
        }
        return $response;
    }


    public function closeConnexion()
    {
        if ($this->socket) {
            fclose($this->socket);
        }
    }


    public function getSocket()
    {
        return $this->socket;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @param callable $listener
     *                              void    callable ( cmd, response, responseCode )
     * @param null $index
     * @return $this
     */
    public function setOnCommandSentListener(callable $listener, $index = null)
    {
        if (null === $index) {
            $this->onCommandSentListeners[] = $listener;
        }
        else {
            $this->onCommandSentListeners[$index] = $listener;
        }
        return $this;
    }

}
