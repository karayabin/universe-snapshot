<?php

namespace Colis\UploaderHandler;


use Colis\InfoHandler\InfoHandlerInterface;
use UploaderHandler\TimMixedUploaderHandler;

class ColisTimUploaderHandler extends TimMixedUploaderHandler
{
    /**
     * @var InfoHandlerInterface[]
     */
    private $infoHandlers;
    private $getInfoByNameCb;

    public function __construct()
    {
        parent::__construct();
        $this->infoHandlers = [];
    }


    protected function onAccept($dst)
    {
        $name = basename($dst);
        $err = '';
        if (false !== ($info = $this->getInfoByName($name, $err))) {
            $this->timServer->success([
                'name' => $name,
                'info' => $info,
            ]);
        }
        else {
            $this->timServer->error($err);
        }
    }

    /**
     * @param $name , string, the name of the item; it can be an external url
     * @param $err , if you need to transmit an error message, use this
     * @return array|false, an array of information that is used to display a preview of an item.
     *
     */

    protected function getInfoByName($name, &$err)
    {
        if (null !== $this->getInfoByNameCb) {
            return call_user_func_array($this->getInfoByNameCb, [$name, &$err]);
        }
        else {
            foreach ($this->infoHandlers as $h) {
                if (false !== ($info = $h->getInfo($name, $err))) {
                    return $info;
                }
            }
        }
        return false;
    }

    public function addInfoHandler(InfoHandlerInterface $h)
    {
        $this->infoHandlers[] = $h;
        return $this;
    }

    public function setGetInfoByNameCb(callable $getInfoByNameCb)
    {
        $this->getInfoByNameCb = $getInfoByNameCb;
        return $this;
    }


}