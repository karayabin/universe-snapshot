<?php


namespace Tim\TimServer;

use Tim\Exception\TransparentException;
use Tim\TimServerGlobal;


/**
 * OpaqueTimServer
 * @author Lingtalfi
 * 2014-12-26
 *
 * An opaque message is the message that gets displayed to the GUI user when the
 * tim server catches an exception.
 *
 * That's because you don't want to reveal sensitive information to the GUI user.
 * Note that the developer can still access caught exceptions messages via the logging system of the Tim server.
 *
 *
 */
class OpaqueTimServer extends TimServer
{

    private $opaqueMessage;


    public function setOpaqueMessage($msg)
    {
        $this->opaqueMessage = $msg;
        return $this;
    }


    protected function onExceptionCaught(\Exception $e)
    {
        if ($e instanceof TransparentException) {
            $this->error($e->getMessage());
        }
        else {
            $opaqueMsg = (null !== $this->opaqueMessage) ? $this->opaqueMessage : TimServerGlobal::getOpaqueMessage($this->serviceName);
            $this->error($opaqueMsg);
        }
    }

}
